<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ContentViewResource;

class ListContentViews extends ListRecords
{
    // use HasDescendingOrder;

    protected static string $resource = ContentViewResource::class;

    

    protected function getActions(): array
    {
        return [
            Action::make('list_document')
                ->label('Liste de document')
                ->url(route('filament.resources.documents.index')), // Assuming 'categories.index' is the route name for the CategoryResource index page
            Action::make('list_image')
                ->label('Liste d\'image')
                ->url(route('filament.resources.images.index')), // Assuming 'categories.index' is the route name for the CategoryResource index page
            Action::make('creer_nouveau')
                ->label('Ajouter')
                ->url(route('filament.resources.content-views.create')), // Assuming 'categories.index' is the route name for the CategoryResource index page
        ];
    }

}
