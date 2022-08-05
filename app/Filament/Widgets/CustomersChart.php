<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\LineChartWidget;

class CustomersChart extends LineChartWidget
{
    protected static ?string $heading = 'Total customers';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $projects = Project::pluck('git_created_at');
        // dd($projects->toArray());

        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => [2021, 2022],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
