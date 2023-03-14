<?php

namespace App\Enums;

use Kiwilan\Steward\Traits\LazyEnum;

enum GitForgeEnum: string
{
    use LazyEnum;

    case gitlab = 'GitLab';

    case github = 'GitHub';

    case bitbucket = 'BitBucket';

    case framagit = 'Framagit';
}
