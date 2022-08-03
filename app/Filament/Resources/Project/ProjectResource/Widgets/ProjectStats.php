<?php

namespace App\Filament\Resources\Project\ProjectResource\Widgets;

use App\Enums\ProjectStatusEnum;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ProjectStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total projects', Project::count()),
            Card::make(
                'Open source projects',
                Project::where('is_open_source', true)->count()
            ),
            Card::make('Ready', Project::where('project_status', ProjectStatusEnum::tpm)->count()),
        ];
    }
}
