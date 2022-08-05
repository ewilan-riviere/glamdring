<?php

namespace App\Services\GitForgeService;

use App\Services\GitForgeService;

/**
 * @property string          $api_url
 * @property GitForgeService $service
 */
interface IGitForge
{
    public function __construct(GitForgeService $service);

    public static function create(GitForgeService $service): IGitForge;

    public function getHeaders(): array;

    public function fetchUser(): GitForgeService;

    public function fetchRepositories(): GitForgeService;
}
