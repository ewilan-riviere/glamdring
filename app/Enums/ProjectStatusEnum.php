<?php

namespace App\Enums;

use App\Traits\LazyEnum;

enum ProjectStatusEnum: string
{
    use LazyEnum;

    case idea = 'Idea';
    case development = 'Development';
    case tpm = 'Third-Party Maintenance';
    case standby = 'Stand-by';
}
