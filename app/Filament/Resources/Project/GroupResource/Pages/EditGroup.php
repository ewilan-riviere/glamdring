<?php

namespace App\Filament\Resources\Project\GroupResource\Pages;

use App\Filament\Resources\Project\GroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroup extends EditRecord
{
    protected static string $resource = GroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
