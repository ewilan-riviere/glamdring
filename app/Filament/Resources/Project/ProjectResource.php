<?php

namespace App\Filament\Resources\Project;

use App\Enums\GitForgeEnum;
use App\Enums\ProjectStatusEnum;
use App\Enums\WebsiteEnum;
use App\Filament\Resources\Project\ProjectResource\Pages\CreateProject;
use App\Filament\Resources\Project\ProjectResource\Pages\EditProject;
use App\Filament\Resources\Project\ProjectResource\Pages\ListProjects;
use App\Filament\Resources\Project\ProjectResource\Widgets\ProjectStats;
use App\Models\Project;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    protected static ?string $slug = 'project/projects';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema(Card::class))
            ->columns([
                'sm' => 3,
                'lg' => null,
            ])
        ;
    }

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

    public static function getWidgets(): array
    {
        return [
            ProjectStats::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(string $layout = Grid::class): array
    {
        return [
            Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(
                                    fn ($state, callable $set) => $set('slug', Str::slug($state))
                                ),
                            TextInput::make('slug')
                                ->disabled()
                                ->required()
                                ->unique(Project::class, 'slug', fn ($record) => $record),
                            MarkdownEditor::make('description')
                                ->toolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'edit',
                                    'italic',
                                    'link',
                                    'preview',
                                    'strike',
                                ])
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                            CheckboxList::make('technologies')
                                ->relationship('technologies', 'name')
                                ->columns(3),
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
                        ])->columns([
                            'sm' => 2,
                        ]),
                    $layout::make()
                        ->schema([
                            Repeater::make('websites')
                                ->relationship()
                                ->schema([
                                    TextInput::make('label'),
                                    TextInput::make('url'),
                                    Select::make('website_type')
                                        ->options(WebsiteEnum::toList()),
                                    Toggle::make('with_credentials')
                                        ->reactive(),
                                    TextInput::make('login')
                                        ->hidden(fn (Closure $get) => ! $get('with_credentials')),
                                    TextInput::make('password')
                                        ->password()
                                        ->hidden(fn (Closure $get) => ! $get('with_credentials')),
                                ])
                                ->collapsible()
                                ->orderable(),
                        ]),
                    $layout::make()
                        ->schema([
                            Repeater::make('repositories')
                                ->relationship()
                                ->schema([
                                    TextInput::make('url'),
                                    Select::make('forge_type')
                                        ->options(GitForgeEnum::toList()),
                                    Toggle::make('is_public')
                                        ->helperText('Public repositories are accessible by anyone.')
                                        ->default(false),
                                ])
                                ->collapsible()
                                ->orderable(),
                        ]),
                ])
                ->columnSpan([
                    'sm' => 2,
                ]),
            Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Placeholder::make('Status'),
                            Group::make()
                                ->schema([
                                    Toggle::make('is_open_source')
                                        ->label('Open source')
                                        ->helperText('Set as open source project.')
                                        ->default(false),
                                ]),
                            DatePicker::make('git_created_at')
                                ->label('Begin at')
                                ->default(now())
                                ->required(),
                            Select::make('group_id')
                                ->relationship('group', 'title'),
                            Select::make('project_status')
                                ->options(ProjectStatusEnum::toList()),
                        ])
                        ->columns(1),
                    $layout::make()
                        ->schema([
                            Placeholder::make('Associations'),
                            Select::make('technology_id')
                                ->relationship('technologyMain', 'name')
                                ->label('Main technology'),
                            Select::make('repository_id')
                                ->options(function (Component $component) {
                                    /** @var Project */
                                    $model = $component->getRecord();
                                    return $model
                                        ->repositories
                                        ->pluck('forge_type', 'id')
                                        ->map(fn (GitForgeEnum $enum) => $enum->value)
                                        ->toArray()
                                    ;
                                })
                                ->label('Main repository'),
                            Select::make('website_id')
                                ->options(function (Component $component) {
                                    /** @var Project */
                                    $model = $component->getRecord();
                                    return $model->websites->pluck('label', 'id');
                                })
                                ->label('Main repository'),
                        ])
                        ->columns(1),
                ])
                ->columnSpan(1),
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
            TextColumn::make('title')
                ->label('Title')
                ->searchable()
                ->sortable(),
            ImageColumn::make('pipeline')
                ->width(80)
                ->height(20)
                ->label('Pipeline')
                ->searchable()
                ->sortable()
                ->toggleable(),
            TextColumn::make('group.title')
                ->searchable()
                ->sortable()
                ->toggleable(),
            BooleanColumn::make('is_open_source')
                ->label('Open source')
                ->searchable()
                ->sortable()
                ->toggleable(),
            TextColumn::make('websites_count')
                ->label('Websites')
                ->searchable()
                ->sortable()
                ->toggleable(),
            TextColumn::make('project_status')
                ->label('Status')
                ->enum(ProjectStatusEnum::toList())
                ->sortable()
                ->toggleable(),
            TextColumn::make('git_created_at')
                ->label('Begin date')
                ->date()
                ->sortable(),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        // return self::$model::whereColumn('qty', '<', 'security_stock')->count();
        return '2';
    }
}
