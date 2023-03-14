<?php

namespace App\Services;

use App\Enums\GitForgeEnum;
use App\Models\ForgeUser;
use App\Models\Project;
use App\Services\GitForge\GithubForge;
use App\Services\GitForge\GitlabForge;
use App\Services\GitForge\IGitForge;
use Illuminate\Support\Collection;

// id: int
// name: string
// path: string
//   - gitlab:path
//   - github:name
// description: string
// default_branch: string
// created_at: datetime
// updated_at: datetime
//   - gitlab:last_activity_at
//   - github:updated_at
// web_url: string
//   - gitlab:web_url
//   - github:html_url
// clone_url: string
//   - gitlab:http_url_to_repo
//   - github:clone_url
// avatar_url: string (gitlab)
// readme_url: string (gitlab)
// visibility: string
// is_open_source: boolean
//   - visibility => 'public'

// language: string (github)
// languages_url: string[] (github)

// tags: string[]
//   - gitlab:tag_list
//   - github:topics
class GitForgeService
{
    public IGitForge $forge;

    /** @var Collection<int, Project> */
    public ?Collection $projects;

    public function __construct(
        public GitForgeEnum $forge_type,
        public string $username,
        public string $api_token,
        public mixed $user_data = null,
        public ?ForgeUser $forge_user = null,
    ) {
    }

    public static function create()
    {
        $forge_type = config('glamdring.forge.type');
        $username = config('glamdring.forge.username');
        $api_token = config('glamdring.forge.token');

        $forge_type = GitForgeEnum::tryFromCase($forge_type);
        $service = new GitForgeService($forge_type, $username, $api_token);

        $service->forge = match ($service->forge_type->name) {
            'github' => GithubForge::create($service),
            'gitlab' => GitlabForge::create($service),
            default => GithubForge::create($service)
        };

        return $service;
    }

    public function fetchUser(): GitForgeService
    {
        $this->forge->fetchUser();

        return $this;
    }

    public function fetchRepositories(): GitForgeService
    {
        $this->forge->fetchRepositories();

        return $this;
    }

    public function fetchProjectsLanguages(): GitForgeService
    {
        // https://nunomaduro.com/speed_up_your_php_http_guzzle_requests_with_concurrency
        Project::each(fn (Project $project) => $this->forge->fetchLanguages($project));

        return $this;
    }
}
