<?php

namespace App\Filament\Resources\ImpactResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\ContentView;
use App\Models\CompositeView;
use App\Models\ContentViewable;
use App\Models\ContentViewType;
use App\Models\Accueilclientitem;
use App\Models\Impact;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Select;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Forms\Components\MorphToSelect\Type;
use Filament\Tables\Contracts\HasRelationshipTable;
use Filament\Resources\RelationManagers\RelationManager;

class ContentViewsRelationManager extends RelationManager
{

    protected static ?string $title = 'Contenus de pages';

    protected static ?string $label = 'Contenus de pages';

    protected static string $relationship = 'contentViews';
    
    // protected static ?string $model = Impact::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([

                    Forms\Components\Select::make('content_view_id')
                        ->label('Contenue de la page')
                        ->options(ContentView::all()->pluck('title', 'id')->toArray())
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ])
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('content_viewable_id')
                        ->label('Liste des impacts')
                        ->options(function (callable $get) {
                            $type = $get('content_viewable_type');
                            $typeid = $get('content_viewable_id');
                            if ($type) {
                                return app($type)::find($typeid)->pluck('title', 'id')->toArray(); // Adjust 'name' as per your model's display field
                            }
                            return Impact::all()->pluck('title', 'id')->toArray();
                        })
                        ->default(function (HasRelationshipTable $livewire) {
                            return $livewire?->ownerRecord?->id ?? null;
                        })
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ])
                        ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content_view_id')
                    ->label('Titre de contenu')
                    ->getStateUsing(fn ($record) => ContentView::find($record->content_view_id)?->title)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('content_viewable_id')
                    ->label('Impact')
                    ->getStateUsing(fn ($record) => Impact::find($record->content_viewable_id)?->title)
                    ->sortable()
                    ->searchable(),
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
            ->headerActions([Tables\Actions\CreateAction::make()
            ->using(function (HasRelationshipTable $livewire, array $data): Model {
                $dataf = $data;
                $dataf["content_viewable_type"] = strval(Impact::class);
                // dd($dataf);
                return ContentViewable::create($dataf); // $livewire->getRelationship()->create($data);
            })])
            ->actions([
                Tables\Actions\EditAction::make()
                ->using(function (HasRelationshipTable $livewire, array $data): ?bool {
                    $dataf = $data;
                    $dataf["content_viewable_type"] = strval(Impact::class);
                    // dd($dataf);
                    $contable = ContentViewable::where([
                        ["content_view_id", "=", $livewire->mountedTableActionData["pivot_content_view_id"]],
                        ["content_viewable_id", "=", $livewire->mountedTableActionData["pivot_content_viewable_id"]],
                    ]); // $livewire->getRelationship()->create($data);
                    // dd($livewire->mountedTableActionData);
                    return $contable?->update($dataf);
                }),
                Tables\Actions\DeleteAction::make()
                ->before(function (Tables\Actions\DeleteAction $action, RelationManager $livewire) {
                    // dd($action, $livewire->mounted:TableActionData);
                    $contable = ContentViewable::where([
                        ["content_view_id", "=", $livewire->mountedTableActionData["content_view_id"]],
                        ["content_viewable_id", "=", $livewire->mountedTableActionData["content_viewable_id"]],
                    ]); // $livewire->getRelationship()->create($data);
                    // dd($livewire->mountedTableActionData);
                    $contable?->delete();

                    $action->cancel();
                }),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
