<?php

namespace App\Filament\Resources\Submission;

use App\Filament\Resources\Submission\SubmissionResource\Pages;
use App\Filament\Resources\Submission\SubmissionResource\Widgets\SubmissionStats;
use App\Models\Submission;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-mail';

    protected static ?string $slug = 'submission/submissions';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Submissions';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        // ->disabled(fn (Page $livewire) => $livewire instanceof EditRecord)
                        // ->dehydrated(fn (Page $livewire) => $livewire instanceof EditRecord),
                        TextInput::make('email')
                            ->required()
                            ->email(),
                        Textarea::make('message')
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        TextInput::make('app'),
                        TextInput::make('ip'),
                        TextInput::make('url'),
                        TextInput::make('to')->required(),
                    ])
                    ->columns([
                        'sm' => 2,
                    ]),
            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ])
        ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('email')->sortable(),
                TextColumn::make('to')->sortable(),
                TextColumn::make('created_at')->sortable(),
            ])
            ->filters([
                Filter::make('verified')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
        ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            SubmissionStats::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'view' => Pages\ViewSubmission::route('/{record}'),
        ];
    }
}
