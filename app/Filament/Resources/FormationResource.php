<?php

namespace App\Filament\Resources;

use App\Models\Formation;
use App\Models\Typeformation;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\FormationResource\Pages;
use App\Models\Accueilformation;

class FormationResource extends Resource
{
    protected static ?string $model = Formation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'CONTENUS DES PAGES';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('title')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Title')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('text')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Text')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('boutontitre')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Boutontitre')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('boutonlien')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Boutonlien')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    FileUpload::make('image')
                        ->rules(['image', 'max:1024'])
                        ->nullable()
                        ->image()
                        ->placeholder('Image')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('imagetitle')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Imagetitle')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('typeformation_id')
                        // ->rules(['exists:typeformations,id'])
                        ->nullable()
                        ->options(Typeformation::all()->pluck('title', 'id')->toArray())
                        ->label('Type de formation')
                        // ->relationship('typeformation', 'title')
                        ->searchable()
                        ->placeholder('Type de formation')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('accueilformation_id')
                        // ->rules(['exists:accueilformations,id'])
                        ->nullable()
                        ->options(Accueilformation::all()->pluck('title', 'id')->toArray())
                        // ->relationship('accueilformation', 'title')
                        ->searchable()
                        ->placeholder('Accueilformation')
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
                Tables\Columns\TextColumn::make('boutontitre')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('boutonlien')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\ImageColumn::make('image')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('imagetitle')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('typeformation.title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('accueilformation.title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\ViewColumn::make('open_url')
                    ->label('')
                    ->view('vendor.filament.components.copy-slug-button'),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                // SelectFilter::make('typeformation_id')
                //     ->relationship('typeformation', 'title')
                //     ->indicator('Typeformation')
                //     ->multiple()
                //     ->label('Typeformation'),

                SelectFilter::make('accueilformation_id')
                    ->relationship('accueilformation', 'title')
                    ->indicator('Accueilformation')
                    ->multiple()
                    ->label('Accueilformation'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormations::route('/'),
            'create' => Pages\CreateFormation::route('/create'),
            'view' => Pages\ViewFormation::route('/{record}'),
            'edit' => Pages\EditFormation::route('/{record}/edit'),
        ];
    }
}
