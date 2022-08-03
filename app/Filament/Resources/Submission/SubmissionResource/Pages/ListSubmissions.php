<?php

namespace App\Filament\Resources\Submission\SubmissionResource\Pages;

use App\Filament\Resources\Submission\SubmissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
