<?php

namespace App\Services\GitForgeService;

use App\Enums\GitForgeEnum;
use App\Models\ForgeUser;
use App\Services\GitForgeService;

/**
 * Docs: https://docs.gitlab.com/ee/api/
 */
class GitlabForge implements IGitForge
{
    public string $api_url = 'https://gitlab.com/api/v4';

    public HttpForge $http;

    public function __construct(
        public GitForgeService $service
    ) {
    }

    public static function create(GitForgeService $service): GitlabForge
    {
        $forge = new GitlabForge($service);
        $forge->http = HttpForge::create($forge);

        return $forge;
    }

    public function getHeaders(): array
    {
        return [
            'PRIVATE-TOKEN' => "{$this->service->api_token}",
        ];
    }

    public function fetchUser(): GitForgeService
    {
        $http = $this->http->get("/users/{$this->service->username}");

        $raw = $http->body;
        $this->service->forge_user = ForgeUser::convert($raw);

        $this->service->forge_user->forge_id = $raw->id;
        $this->service->forge_user->forge_type = GitForgeEnum::gitlab;

        return $this->service;
    }

    public function fetchRepositories(): GitForgeService
    {
        $http = $this->http->get('/projects?owned=true');
        $raw = $http->body;
        dump($raw);
        return $this->service;
    }
}
