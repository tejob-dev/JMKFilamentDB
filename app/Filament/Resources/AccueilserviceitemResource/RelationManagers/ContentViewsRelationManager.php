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

    protected static string $relationship = 'content_viewables';

    protected static ?string $recordTitleAttribute = 'title';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                    Select::make('content_view_id')
                        ->label("Vue composante")
                        // ->rules(['exists:accueilservices,id'])
                        ->nullable()
                        // ->relationship('accueilservice', 'title')

                        // ->id('composite_view_id')
                        // ->extraAttributes(['class' => 'composite_view_class'])
                        ->options(CompositeView::all()->pluck('title', 'id')->toArray())
                        ->searchable()
                        ->placeholder('Vue composante')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]), 

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
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
