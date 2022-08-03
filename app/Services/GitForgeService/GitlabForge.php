<?php

namespace App\Services\GitForgeService;

use App\Models\ForgeUser;
use App\Services\GitForgeService;

class GitlabForge implements IGitForge
{
    public string $api_url = 'https://gitlab.com/api/v4';

    public function __construct(
        public GitForgeService $service
    ) {
    }

    public static function create(GitForgeService $service): GitlabForge
    {
        $forge = new GitlabForge($service);
        $forge->fetchUser();

        return $forge;
    }

    public function fetchUser(): GitForgeService
    {
        $http = HttpForge::create($this->api_url, $this->service->api_token);
        $http = $http->get("/users/{$this->service->username}");

        $raw = $http->body;
        $raw->username = $raw->login;
        $this->service->forge_user = ForgeUser::convert($raw);

        return $this->service;
    }
}
