<?php

namespace App\Filament\Resources\Project\ProjectResource\Pages;

use App\Filament\Resources\Project\ProjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return ProjectResource::getWidgets();
    }
}
