<?php

namespace App\Filament\Resources\Submission\SubmissionResource\Widgets;

use App\Models\Submission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class SubmissionStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Products', Submission::count()),
            // Card::make('Product Inventory', Product::sum('qty')),
            // Card::make('Average price', number_format(Product::avg('price'), 2)),
        ];
    }
}
