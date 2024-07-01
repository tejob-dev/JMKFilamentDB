<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use App\Models\ContentView;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ContentViewResource;

class EditContentView extends EditRecord
{
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
           
        ];
    }

}
