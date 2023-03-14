<?php

namespace App\Services\GitForge;

use App\Services\GitForgeService;

abstract class GitForge implements IGitForge
{
    public string $api_url;

    public GitForgeService $service;
}
