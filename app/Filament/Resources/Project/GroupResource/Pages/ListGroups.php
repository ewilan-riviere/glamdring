<?php

namespace App\Filament\Resources\Project\GroupResource\Pages;

use App\Filament\Resources\Project\GroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroups extends ListRecords
{
    protected static string $resource = GroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
