<?php

namespace App\Enums;

use App\Traits\LazyEnum;

enum WebsiteEnum: string
{
    use LazyEnum;

    case production = 'Production';
    case recette = 'Recette';
}
