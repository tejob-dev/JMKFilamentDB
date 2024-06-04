<?php

namespace App\Filament\Resources;

use App\Models\Lienfooter;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\LienfooterResource\Pages;

class LienfooterResource extends Resource
{

    protected static ?string $label = 'Lien pieds de page';

    protected static ?string $model = Lienfooter::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'titre';

    protected static ?string $navigationGroup = 'CONTENUS DES PAGES';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('titre')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Titre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('lien_page')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Lien Page')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('descript')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Descript')
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
                Tables\Columns\TextColumn::make('titre')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('lien_page')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('descript')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLienfooters::route('/'),
            'create' => Pages\CreateLienfooter::route('/create'),
            'view' => Pages\ViewLienfooter::route('/{record}'),
            'edit' => Pages\EditLienfooter::route('/{record}/edit'),
        ];
    }
}
