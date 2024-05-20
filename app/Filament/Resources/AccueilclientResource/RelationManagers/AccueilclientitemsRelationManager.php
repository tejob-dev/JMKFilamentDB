<?php

namespace App\Filament\Resources\AccueilclientResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AccueilclientitemsRelationManager extends RelationManager
{
    protected static string $relationship = 'accueilclientitems';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
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

                Select::make('icone')
                    ->rules(['max:255', 'string'])
                    ->searchable()
                    ->options([
                        "flaticon-headphone"=> "Casque",
                        "flaticon-rise"=> "Montée",
                        "flaticon-conversation"=> "Conversation",
                        "flaticon-right-arrow"=> "Flèche droite",
                        "flaticon-up-chevron"=> "Chevron vers le haut",
                        "flaticon-down-arrow"=> "Flèche vers le bas",
                        "flaticon-searching"=> "Recherche",
                        "flaticon-right-chevron"=> "Chevron droit",
                        "flaticon-play-button"=> "Bouton de lecture",
                        "flaticon-analytics"=> "Analytique",
                        "flaticon-office-building"=> "Immeuble de bureaux",
                        "flaticon-retirement"=> "Retraite",
                        "flaticon-development"=> "Développement",
                        "flaticon-strategy"=> "Stratégie",
                        "flaticon-knowledge"=> "Connaissance",
                        "flaticon-risk-management"=> "Gestion des risques",
                        "flaticon-united"=> "Unis",
                        "flaticon-monitor"=> "Moniteur",
                        "flaticon-clock"=> "Horloge",
                        "flaticon-advice"=> "Conseil",
                        "flaticon-right-arrow-1"=> "Flèche droite 1",
                        "flaticon-diagonal-arrow"=> "Flèche diagonale",
                        "flaticon-meeting"=> "Réunion",
                        "flaticon-paper"=> "Papier",
                        "flaticon-analysis"=> "Analyse",
                        "flaticon-zoom-in"=> "Zoomer",
                        "flaticon-cartoon"=> "Dessin animé",
                        "flaticon-quote"=> "Citation",
                        "flaticon-customer-service"=> "Service client",
                        "flaticon-clock-1"=> "Horloge 1",
                        "flaticon-global"=> "Global",
                        "flaticon-downloads"=> "Téléchargements",
                        "flaticon-submit"=> "Soumettre",
                        "flaticon-idea"=> "Idée",
                        "flaticon-star"=> "Étoile",
                        "flaticon-diamond"=> "Diamant",
                        "flaticon-feedback"=> "Retour d'information",
                        "flaticon-send"=> "Envoyer",
                        "flaticon-up-arrow"=> "Flèche vers le haut",
                        "flaticon-location"=> "Emplacement",
                        "flaticon-share"=> "Partager",
                        "flaticon-zigzag"=> "Zigzag",
                        "flaticon-whatsapp"=> "WhatsApp",
                        "flaticon-newsletter"=> "Newsletter",
                        "flaticon-star-1"=> "Étoile 1",
                        "flaticon-half-star"=> "Demi-étoile",
                        "flaticon-chat"=> "Discussion",
                        "flaticon-expand-arrows"=> "Flèches d'expansion",
                        "flaticon-money-growth"=> "Croissance de l'argent",
                        "flaticon-analysis-1"=> "Analyse 1",
                        "flaticon-trophy"=> "Trophée",
                        "flaticon-speech-balloon"=> "Bulle de dialogue",
                        "flaticon-scroll"=> "Défilement",
                        "flaticon-time-management"=> "Gestion du temps",
                        "flaticon-download-pdf"=> "Télécharger PDF",
                        "flaticon-download"=> "Télécharger",
                        "flaticon-difficulties"=> "Difficultés",
                        "flaticon-achievement"=> "Réalisation",
                        "flaticon-chat-1"=> "Discussion 1",
                        "flaticon-customer-service-1"=> "Service client 1",
                        "flaticon-chat-2"=> "Discussion 2",
                        "flaticon-mail"=> "Courrier",
                        "flaticon-cityscape"=> "Paysage urbain",
                        "flaticon-location-1"=> "Emplacement 1",
                        "flaticon-down-arrow-1"=> "Flèche descendant"
                    ])
                    ->placeholder('Icone')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                FileUpload::make('image')
                    ->rules(['image', 'max:1024'])
                    ->image()
                    ->placeholder('Image')
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
                Tables\Columns\TextColumn::make('title')->limit(50),
                Tables\Columns\TextColumn::make('text')->limit(50),
                Tables\Columns\TextColumn::make('boutontitre')->limit(50),
                Tables\Columns\TextColumn::make('boutonlien')->limit(50),
                Tables\Columns\TextColumn::make('icone')->enum([]),
                Tables\Columns\ImageColumn::make('image')->rounded(),
                Tables\Columns\TextColumn::make('accueilclient.title')->limit(
                    50
                ),
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

                MultiSelectFilter::make('accueilclient_id')->relationship(
                    'accueilclient',
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
