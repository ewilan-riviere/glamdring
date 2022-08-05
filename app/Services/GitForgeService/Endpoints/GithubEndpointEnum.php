<?php

namespace App\Services\GitForgeService\Endpoints;

use App\Traits\LazyEnum;

enum GithubEndpointEnum: string
{
    use LazyEnum;

    case findAllUser = '/users';
    case findUser = '/users/{param}';
    case findAllUserRepository = '/users/{param}/repos';
    case findUserRepository = '/users/{param}/repos/{param}';

    // case findAllUser = '/users';
    // case findUser = '/users/:id';
    // case findAllUserRepository = '/groups/:id/projects';
    // case findUserRepository = '/groups/:id/projects';
}
