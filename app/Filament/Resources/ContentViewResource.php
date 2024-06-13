<?php

namespace App\Filament\Resources;

use App\Models\ContentView;
use App\Models\CompositeView;
use Filament\{Tables, Forms};
use App\Models\ContentViewType;
use App\Models\Accueilclientitem;
use App\Models\Accueilserviceitem;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Html;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MorphToSelect;
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\MorphToSelect\Type;
use App\Filament\Resources\ContentViewResource\Pages;

class ContentViewResource extends Resource
{

    protected static ?string $label = 'Contenus de pages';

    protected static ?string $model = ContentView::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    // protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationGroup = 'DETAILS DU CONTENUS DES PAGES';

    // public static function getTableQuery(): Builder 
    // {
    //     return ContentView::orderBy('title', "desc")->query();
    // }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('title')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->label('Titre')
                        ->placeholder('Titre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                        
                    Select::make('composite_view_id')
                        ->label("Vue composante")
                        // ->rules(['exists:accueilservices,id'])
                        ->nullable()
                        // ->relationship('accueilservice', 'title')

                        ->id('composite_view_id')
                        ->extraAttributes(['class' => 'composite_view_class'])
                        ->options(CompositeView::all()->pluck('title', 'id')->toArray())
                        ->searchable()
                        ->placeholder('Vue composante')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]), 
                        
                    View::make('vendor.filament.components.dynamic-image')
                        ->extraAttributes(['class' => 'dynamic_image_class'])
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Textarea::make('content')
                        ->rules(['string'])
                        ->required()
                        ->id('content')
                        ->extraAttributes(['class' => 'content_class'])
                        ->label('Le contenu')
                        ->placeholder('Le contenu')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('priority')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->label('La position')
                        ->placeholder('La position')
                        ->default('0')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('content_view_type_id')
                        // ->rules(['exists:content_view_types,id'])
                        ->required()
                        // ->relationship('contentViewType', 'title')
                        ->options(ContentViewType::all()->pluck('title', 'id')->toArray())
                        ->searchable()
                        ->label('Type de contenu')
                        ->placeholder('Type de contenu')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    MorphToSelect::make("content_viewable")
                    ->label("Type de contenu")
                    // ->extraAttributes(['class' => 'bg-gray-50'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 9,
                        'lg' => 9,
                    ])
                    ->types(
                        [
                            Type::make(Accueilserviceitem::class)
                            ->label("Les services")
                            ->titleColumnName("title"),
                            Type::make(Accueilclientitem::class)
                            ->label("Les clients")
                            ->titleColumnName("title"),
                        ]
                    )
                    ->searchable()
                    ->preload(),

                    // TextInput::make('content_viewable_id')
                    //     ->rules(['max:255'])
                    //     ->required()
                    //     ->placeholder('Content Viewable Id')
                    //     ->columnSpan([
                    //         'default' => 12,
                    //         'md' => 12,
                    //         'lg' => 12,
                    //     ]),

                    // TextInput::make('content_viewable_type')
                    //     ->rules(['max:255', 'string'])
                    //     ->required()
                    //     ->placeholder('Content Viewable Type')
                    //     ->columnSpan([
                    //         'default' => 12,
                    //         'md' => 12,
                    //         'lg' => 12,
                    //     ]),
                ]),
            ]),
        ]);
    }

    // protected function getTableQuery(): Builder
    // {
    //     dd(parent::getTableQuery()->filteredList()->toSql())
    //     return parent::getTableQuery()->filteredList();
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->toggleable()
                    ->sortable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('content_viewable.title')
                    ->label('Titre de page')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                // Tables\Columns\TextColumn::make('content_viewable_type')
                //     ->label('Contenu appartenant à')
                //     ->toggleable()
                //     ->searchable(true, null, true)
                //     ->limit(50),
                Tables\Columns\TextColumn::make('content')
                    ->label('Le contenu')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('priority')
                    ->label('La position')
                    ->sortable()
                    ->toggleable(),
                    // ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('contentViewType.title')
                    ->label('Type de contenu')
                    ->toggleable()
                    ->limit(50),
                    
                ViewColumn::make('open_url')
                    ->label('')
                    ->view('vendor.filament.components.copy-url-button'),

                // Tables\Columns\TextColumn::make('content_viewable_type')
                //     ->toggleable()
                //     ->searchable(true, null, true)
                //     ->limit(50),
            ])
            ->defaultSort("content_viewable_type")
            // ->reorderable('title')
            ->filters([
                // DateRangeFilter::make('created_at'),

                // SelectFilter::make('content_view_type_id')
                //     ->relationship('contentViewType', 'title')
                //     ->indicator('ContentViewType')
                //     ->multiple()
                //     ->label('ContentViewType'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContentViews::route('/'),
            'create' => Pages\CreateContentView::route('/create'),
            'view' => Pages\ViewContentView::route('/{record}'),
            'edit' => Pages\EditContentView::route('/{record}/edit'),
        ];
    }
}
