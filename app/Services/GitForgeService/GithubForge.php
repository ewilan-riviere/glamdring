<?php

namespace App\Services\GitForgeService;

use App\Models\ForgeUser;
use App\Services\GitForgeService;
use Http;

class GithubForge implements IGitForge
{
    public string $api_url = 'https://api.github.com';

    public function __construct(
        public GitForgeService $service
    ) {
    }

    public static function create(GitForgeService $service): GithubForge
    {
        $forge = new GithubForge($service);
        $forge->fetchUser();

        return $forge;
    }

    public function fetchUser(): GitForgeService
    {
        // https://nunomaduro.com/speed_up_your_php_http_guzzle_requests_with_concurrency
        $http = HttpForge::create($this->api_url, $this->service->api_token);
        $http = $http->get("/users/{$this->service->username}");

        $raw = $http->body;
        $raw->username = $raw->login;
        $this->service->forge_user = ForgeUser::convert($raw);

        return $this->service;
    }
}
