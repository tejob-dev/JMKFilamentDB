<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use App\Models\ContentView;
use Filament\Pages\Actions\Action;
use Filament\Tables\Actions\ButtonAction;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ContentViewResource;


class CreateContentView extends CreateRecord
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

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Enregistrer') // Change the label here
                ->action('create')
                ->color('primary'),
            
            Action::make('createAnother')
                ->label('Enregistrer puis ajouter') // Change the label here
                ->action('createAnother')
                ->color('secondary'),

            Action::make('cancel')
                ->label('Annuler') // Change the label here
                ->url($this->getResource()::getUrl('index'))
                ->color('secondary'),
        ];
    }

}
