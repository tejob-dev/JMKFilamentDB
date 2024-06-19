<?php

namespace App\Filament\Resources\AccueilserviceitemResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AccueilserviceitemResource;
use App\Models\Accueilserviceitem;

class CreateAccueilserviceitem extends CreateRecord
{
    protected static string $resource = AccueilserviceitemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        if(preg_match("/\/projets\//i", $data['boutonlien']) == false){
            $data['boutonlien'] = Accueilserviceitem::formatBoutonLien("/services/", $data['boutonlien'], $data['title']);
        }
        return $data;
    }
}
