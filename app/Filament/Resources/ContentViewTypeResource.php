<?php

namespace App\Filament\Resources;

use App\Models\ContentViewType;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ContentViewTypeResource\Pages;

class ContentViewTypeResource extends Resource
{

    protected static ?string $label = 'Types de contenu';

    protected static ?string $model = ContentViewType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'LES DONNEES';

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
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            // ContentViewTypeResource\RelationManagers\ContentViewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContentViewTypes::route('/'),
            'create' => Pages\CreateContentViewType::route('/create'),
            'view' => Pages\ViewContentViewType::route('/{record}'),
            'edit' => Pages\EditContentViewType::route('/{record}/edit'),
        ];
    }
}
