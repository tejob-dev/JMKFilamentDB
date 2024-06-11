<?php

namespace App\Filament\Resources;

use App\Models\Image;
use Filament\{Tables, Forms};
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ImageResource\Pages;
use Filament\Resources\{Form, Table, Resource};

class ImageResource extends Resource
{

    protected static ?string $label = 'Les images';

    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'MÉDIATHEQUES';

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

                    FileUpload::make('photo')
                        ->rules(['file'])
                        ->nullable()
                        ->image()
                        ->placeholder('Photo')
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
                Tables\Columns\ImageColumn::make('photo')
                    ->toggleable()
                    ->circular(),
                Tables\Columns\TextColumn::make('photo') // Assuming you have a column for the file
                    ->label('Lien de l\'image')
                    ->formatStateUsing(fn($state) => $state ? "Image chargée" : 'Pas d\'image'),
                ViewColumn::make('copy_url')
                    ->label('')
                    ->view('vendor.filament.components.copy-url-button'),
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'view' => Pages\ViewImage::route('/{record}'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
