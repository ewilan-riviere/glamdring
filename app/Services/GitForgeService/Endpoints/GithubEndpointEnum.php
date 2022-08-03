<?php

namespace App\Services\GitForgeService\Endpoints;

use App\Traits\LazyEnum;

enum GithubEndpointEnum: string
{
    use LazyEnum;

    case users = '/users';
    case user = '/users/{param}';
}
