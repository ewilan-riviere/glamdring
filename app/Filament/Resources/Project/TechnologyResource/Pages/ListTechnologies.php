<?php

namespace App\Filament\Resources\Project\TechnologyResource\Pages;

use App\Filament\Resources\Project\TechnologyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechnologies extends ListRecords
{
    protected static string $resource = TechnologyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
