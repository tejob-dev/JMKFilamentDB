<?php

namespace App\Filament\Resources\AccueilserviceitemResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\CompositeView;
use App\Models\ContentViewType;
use App\Models\Accueilclientitem;
use App\Models\Accueilserviceitem;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Forms\Components\MorphToSelect\Type;
use Filament\Resources\RelationManagers\RelationManager;

class ContentViewsRelationManager extends RelationManager
{

    protected static ?string $title = 'Contenus de pages';

    protected static string $relationship = 'contentViews';

    protected static ?string $recordTitleAttribute = 'title';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
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
                //     ->placeholder('Content Viewable Id')
                //     ->columnSpan([
                //         'default' => 12,
                //         'md' => 12,
                //         'lg' => 12,
                //     ]),

                // TextInput::make('content_viewable_type')
                //     ->rules(['max:255', 'string'])
                //     ->placeholder('Content Viewable Type')
                //     ->columnSpan([
                //         'default' => 12,
                //         'md' => 12,
                //         'lg' => 12,
                //     ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Columns\TextColumn::make('content_viewable_type')
                    ->label('Contenu appartenant à')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
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
            ])
            ->defaultSort("content_viewable_type")
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                MultiSelectFilter::make('content_view_type_id')->relationship(
                    'contentViewType',
                    'title'
                ),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
