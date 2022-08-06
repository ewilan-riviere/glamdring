<?php

namespace App\Services\GitForgeService;

use App\Enums\GitForgeEnum;
use App\Models\ForgeUser;
use App\Models\Project;
use App\Services\GitForgeService;
use Illuminate\Support\Carbon;

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
        $http = $this->http->get('/projects', [
            'min_access_level' => 30,
            'archived' => false,
            'order_by' => 'last_activity_at',
            'sort' => 'desc',
            'per_page' => 20,
        ]);
        $raw = $http->body;

        foreach ($raw as $raw_repository) {
            $project = Project::create((array) $raw_repository);

            $project->git_id = $raw_repository->id;
            $project->path = $raw_repository->path_with_namespace;
            $project->git_created_at = Carbon::createFromTimeString($raw_repository->created_at);
            $project->git_updated_at = Carbon::createFromTimeString($raw_repository->last_activity_at);
            $project->clone_url = $raw_repository->http_url_to_repo;
            $project->avatar_url = $raw_repository->avatar_url;
            $project->readme_raw = "{$project->web_url}/-/raw/main/README.md";
            $project->package_json_raw = "{$project->web_url}/-/raw/main/package.json";
            $project->composer_json_raw = "{$project->web_url}/-/raw/main/composer.json";
            $project->is_open_source = $project->visibility === 'public';

            $project->save();
        }

        return $this->service;
    }
}
