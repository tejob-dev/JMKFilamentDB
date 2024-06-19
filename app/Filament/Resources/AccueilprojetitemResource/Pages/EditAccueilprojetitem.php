<?php

namespace App\Filament\Resources\AccueilprojetitemResource\Pages;

use App\Models\Accueilprojetitem;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AccueilprojetitemResource;

class EditAccueilprojetitem extends EditRecord
{
    protected static string $resource = AccueilprojetitemResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(preg_match("/\/projets\//i", $data['boutonlien']) == false){
            $data['boutonlien'] = Accueilprojetitem::formatBoutonLien("/projets/", $data['boutonlien'], $data['title']);
        }
        return $data;
    }
}
