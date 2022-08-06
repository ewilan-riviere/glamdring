<?php

namespace App\Services\GitForgeService;

use App\Enums\GitForgeEnum;
use App\Models\ForgeUser;
use App\Services\GitForgeService;
use Http;

/**
 * Docs: https://docs.github.com/en/rest
 */
class GithubForge implements IGitForge
{
    public string $api_url = 'https://api.github.com';

    public HttpForge $http;

    public function __construct(
        public GitForgeService $service
    ) {
    }

    public static function create(GitForgeService $service): GithubForge
    {
        $forge = new GithubForge($service);
        $forge->http = HttpForge::create($forge);

        return $forge;
    }

    public function getHeaders(): array
    {
        return [
            'Authorization' => "token {$this->service->api_token}",
        ];
    }

    public function fetchUser(): GitForgeService
    {
        // https://nunomaduro.com/speed_up_your_php_http_guzzle_requests_with_concurrency
        $http = $this->http->get("/users/{$this->service->username}");

        $raw = $http->body;
        $raw->username = $raw->login;
        $this->service->forge_user = ForgeUser::convert($raw);

        $this->service->forge_user->forge_id = $raw->id;
        $this->service->forge_user->web_url = $raw->html_url;
        $this->service->forge_user->forge_type = GitForgeEnum::github;

        return $this->service;
    }

    public function fetchRepositories(): GitForgeService
    {
        $http = $this->http->get("/users/{$this->service->username}/repos");

        $raw = $http->body;
        dump($raw);
        // $raw->username = $raw->login;
        // $this->service->forge_user = ForgeUser::convert($raw);

        return $this->service;
    }
}
