<?php

namespace App\Services;

use App\Enums\GitForgeEnum;
use App\Models\ForgeUser;
use App\Services\GitForgeService\GithubForge;
use App\Services\GitForgeService\GitlabForge;
use App\Services\GitForgeService\IGitForge;

class GitForgeService
{
    public IGitForge $forge;

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
}
