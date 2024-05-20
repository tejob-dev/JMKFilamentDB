<?php

namespace App\Filament\Resources;

use App\Models\Actualite;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ActualiteResource\Pages;

class ActualiteResource extends Resource
{
    protected static ?string $model = Actualite::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'PAGE DU SITE';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('section')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Section')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('title')
                        ->rules(['max:255', 'string'])
                        ->nullable()
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

                    DatePicker::make('dateactu')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Dateactu')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('managernom')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Managernom')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('typeformation_id')
                        ->rules(['exists:typeformations,id'])
                        ->nullable()
                        ->relationship('typeformation', 'title')
                        ->searchable()
                        ->placeholder('Typeformation')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('accueilactu_id')
                        ->rules(['exists:accueilactus,id'])
                        ->nullable()
                        ->relationship('accueilactu', 'title')
                        ->searchable()
                        ->placeholder('Accueilactu')
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
                Tables\Columns\TextColumn::make('section')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
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
                Tables\Columns\TextColumn::make('dateactu')
                    ->toggleable()
                    ->date(),
                Tables\Columns\TextColumn::make('managernom')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('typeformation.title')
                    ->toggleable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('accueilactu.title')
                    ->toggleable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('typeformation_id')
                    ->relationship('typeformation', 'title')
                    ->indicator('Typeformation')
                    ->multiple()
                    ->label('Typeformation'),

                SelectFilter::make('accueilactu_id')
                    ->relationship('accueilactu', 'title')
                    ->indicator('Accueilactu')
                    ->multiple()
                    ->label('Accueilactu'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActualites::route('/'),
            'create' => Pages\CreateActualite::route('/create'),
            'view' => Pages\ViewActualite::route('/{record}'),
            'edit' => Pages\EditActualite::route('/{record}/edit'),
        ];
    }
}
