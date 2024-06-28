<?php

namespace App\Filament\Resources;

use App\Models\CompositeView;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\CompositeViewResource\Pages;

class CompositeViewResource extends Resource
{
    protected static ?string $label = 'Vues composées';

    protected static ?string $model = CompositeView::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'LES DONNEES';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('title')
                        ->label("Titre")
                        ->rules(['max:255', 'string'])
                        ->required()
                        // ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),         

                    Textarea::make('content')
                        ->label("Contenu html")
                        ->rules(['string'])
                        ->required()
                        // ->placeholder('Content')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('image')
                        ->label("Image répresentative")
                        ->rules(['image'])
                        ->nullable()
                        ->image()
                        ->placeholder('Image')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('required')
                        ->label("Champs nécessaires (séparer de virgule)")
                        ->rules(['string'])
                        ->required()
                        // ->placeholder('Required')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label("Titre")
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('content')
                    ->label("Contenu html")
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\ImageColumn::make('image')
                    ->label("Image répresentative")
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('required')
                    ->label("Champs nécessaires")
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            // CompositeViewResource\RelationManagers\ContentViewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompositeViews::route('/'),
            'create' => Pages\CreateCompositeView::route('/create'),
            'view' => Pages\ViewCompositeView::route('/{record}'),
            'edit' => Pages\EditCompositeView::route('/{record}/edit'),
        ];
    }
}
