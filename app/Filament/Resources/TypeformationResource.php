<?php

namespace App\Filament\Resources;

use App\Models\Typeformation;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\TypeformationResource\Pages;

class TypeformationResource extends Resource
{

    protected static ?string $label = "Types de formations";

    protected static ?string $model = Typeformation::class;

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

                    Select::make('icone')
                        ->rules(['max:255', 'string'])
                        ->nullable()
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
                Tables\Columns\TextColumn::make('icone')
                    ->toggleable()
                    ->searchable()
                    ->enum([]),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            TypeformationResource\RelationManagers\FormationsRelationManager::class,
            TypeformationResource\RelationManagers\ActualitesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeformations::route('/'),
            'create' => Pages\CreateTypeformation::route('/create'),
            'view' => Pages\ViewTypeformation::route('/{record}'),
            'edit' => Pages\EditTypeformation::route('/{record}/edit'),
        ];
    }
}
