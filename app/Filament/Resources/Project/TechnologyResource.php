<?php

namespace App\Filament\Resources\Project;

use App\Filament\Resources\Project\TechnologyResource\Pages;
use App\Models\Technology;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Str;

class TechnologyResource extends Resource
{
    protected static ?string $model = Technology::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $slug = 'project/technologies';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(
                                        fn ($state, callable $set) => $set('slug', Str::slug($state))
                                    ),
                                TextInput::make('slug')
                                    ->disabled()
                                    ->required()
                                    ->unique(Technology::class, 'slug', fn ($record) => $record),
                                TextInput::make('url')
                                    ->url(),
                                TextInput::make('last_version')
                                    ->numeric(),
                            ])
                            ->columns([
                                'sm' => 2,
                            ]),
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->hint('Accept JPG, WEBP, PNG')
                                    ->acceptedFileTypes([
                                        'image/jpeg',
                                        'image/webp',
                                        'image/png',
                                    ])
                                    ->image()
                                    ->maxSize(2048)
                                    ->directory('projects'),
                                ColorPicker::make('color')
                                    ->hex(),
                            ]),
                    ])
                    ->columnSpan(1),
            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ])
        ;
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             //
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\DeleteBulkAction::make(),
    //         ]);
    // }
    public static function table(Table $table): Table
    {
        return $table
            ->columns(static::getTableColumns())
            ->filters([
                //
            ])
        ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTechnologies::route('/'),
            'create' => Pages\CreateTechnology::route('/create'),
            'edit' => Pages\EditTechnology::route('/{record}/edit'),
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            ImageColumn::make('image')
                ->label('Image')
                ->width(50)
                ->height(50)
                ->rounded(),
            TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable(),
            TextColumn::make('last_version')
                ->label('Last version')
                ->searchable()
                ->sortable(),
        ];
    }
}
