<?php

namespace App\Filament\Resources\AccueilactuResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Typeformation;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ActualitesRelationManager extends RelationManager
{
    protected static string $relationship = 'actualites';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('section')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Section')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('title')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Title')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('text')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Text')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('boutontitre')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Boutontitre')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('boutonlien')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Boutonlien')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                FileUpload::make('image')
                    ->rules(['image', 'max:10240'])
                    ->image()
                    ->placeholder('Image')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('imagetitle')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Imagetitle')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('dateactu')
                    ->rules(['date'])
                    ->placeholder('Dateactu')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('managernom')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Managernom')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('typeformation_id')
                    // ->rules(['exists:typeformations,id'])
                    // ->relationship('typeformation', 'title')
                    ->options(Typeformation::all()->pluck('title', 'id')->toArray())
                    ->searchable()
                    ->placeholder('Typeformation')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')->limit(50),
                Tables\Columns\TextColumn::make('title')->limit(50),
                Tables\Columns\TextColumn::make('text')->limit(50),
                Tables\Columns\TextColumn::make('boutontitre')->limit(50),
                Tables\Columns\TextColumn::make('boutonlien')->limit(50),
                Tables\Columns\ImageColumn::make('image')->rounded(),
                Tables\Columns\TextColumn::make('imagetitle')->limit(50),
                Tables\Columns\TextColumn::make('dateactu')->date(),
                Tables\Columns\TextColumn::make('managernom')->limit(50),
                Tables\Columns\TextColumn::make('typeformation.title')->limit(
                    50
                ),
                Tables\Columns\TextColumn::make('accueilactu.title')->limit(50),
            ])
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

                MultiSelectFilter::make('typeformation_id')->relationship(
                    'typeformation',
                    'title'
                ),

                MultiSelectFilter::make('accueilactu_id')->relationship(
                    'accueilactu',
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
