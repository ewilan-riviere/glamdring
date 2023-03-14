<?php

namespace App\Enums;

use Kiwilan\Steward\Traits\LazyEnum;

enum WebsiteEnum: string
{
    use LazyEnum;

    case production = 'Production';

    case recette = 'Recette';
}
