<?php

namespace App\Services\GitForge;

use App\Models\ForgeUser;
use App\Services\GitForgeService;

/**
 * Docs: https://developer.atlassian.com/cloud/bitbucket/rest/intro/
 */
class BitbucketForge implements IGitForge
{
    public string $api_url = 'https://api.bitbucket.org/2.0';

    public HttpForge $http;

    public function __construct(
        public GitForgeService $service
    ) {
    }

    public static function create(GitForgeService $service): BitbucketForge
    {
        $forge = new BitbucketForge($service);
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
        // $http = $this->http->get("/users/{$this->service->username}");

        // $raw = $http->body;
        // $this->service->forge_user = ForgeUser::convert($raw);

        return $this->service;
    }

    public function fetchRepositories(): GitForgeService
    {
        // $http = $this->http->get("/projects?owned=true");
        // $raw = $http->body;

        return $this->service;
    }
}
