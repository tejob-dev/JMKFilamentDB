<?php

namespace App\Filament\Resources;

use App\Models\Setting;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\{Form, Table, Resource};
use App\Filament\Resources\SettingResource\Pages;
use Filament\Forms\Components\RichEditor;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Gestion utilisateur';

    protected static ?string $recordTitleAttribute = 'nom_site';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('nom_site')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Nom Site')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
 
                //    TextInput::make('logo_site')
                //         ->rules(['max:255', 'string'])
                //         ->required()
                //         ->placeholder('Logo Site')
                //         ->columnSpan([
                //             'default' => 12,
                //             'md' => 12,
                //             'lg' => 12,
                //         ]),

                    FileUpload::make('logo_site')
                        ->rules(['image', 'max:1024'])
                        ->nullable()
                        ->image()
                        ->placeholder('Logo site')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('contact_site')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Contact Site')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('email_site')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Email Site')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('defaut_lang')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Defaut Lang')
                        ->default('fr')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('position_site')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Localisation')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('list_social')
                        ->rules(['string'])
                        ->nullable()
                        ->placeholder('List Social')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('lien_contact')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Lien Contact')
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
                Tables\Columns\TextColumn::make('nom_site')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                // Tables\Columns\TextColumn::make('logo_site')
                //     ->toggleable()
                //     ->searchable(true, null, true)
                //     ->limit(50),
                Tables\Columns\ImageColumn::make('logo_site')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('contact_site')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('email_site')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('defaut_lang')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('position_site')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('list_social')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('lien_contact')
                    ->toggleable()
                    ->searchable(true, null, true)
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
