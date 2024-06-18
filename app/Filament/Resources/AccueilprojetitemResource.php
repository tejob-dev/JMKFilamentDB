<?php

namespace App\Filament\Resources;

use Filament\{Tables, Forms};
use App\Models\Accueilprojetitem;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\AccueilprojetitemResource\Pages;

class AccueilprojetitemResource extends Resource
{
    protected static ?string $label = 'Projets';

    protected static ?string $model = Accueilprojetitem::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'CONTENUS DES PAGES';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('title')
                        ->label("Titre")
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Textarea::make('text')
                        ->label("Descriptions")
                        ->rules([ 'string'])
                        ->nullable()
                        ->placeholder('Text')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('subservice')
                        ->label("Autres descriptions")
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Subservice')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('boutontitre')
                        ->label("Titre de bouton")
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Boutontitre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('boutonlien')
                        ->label("Lien de page/lien bouton")
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Boutonlien')
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
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('text')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('subservice')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('boutontitre')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('boutonlien')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                ViewColumn::make('open_url')
                    ->label('')
                    ->view('vendor.filament.components.copy-slug-button'),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            AccueilprojetitemResource\RelationManagers\ContentViewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccueilprojetitems::route('/'),
            'create' => Pages\CreateAccueilprojetitem::route('/create'),
            'view' => Pages\ViewAccueilprojetitem::route('/{record}'),
            'edit' => Pages\EditAccueilprojetitem::route('/{record}/edit'),
        ];
    }
}
