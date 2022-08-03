<?php

namespace App\Filament\Resources\Project\ProjectResource\Pages;

use App\Filament\Resources\Project\ProjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
