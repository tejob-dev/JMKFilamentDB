<?php

namespace App\Filament\Resources\AccueilserviceitemResource\Pages;

use App\Models\Accueilserviceitem;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AccueilserviceitemResource;

class EditAccueilserviceitem extends EditRecord
{
    protected static string $resource = AccueilserviceitemResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // dd($data);
        $data['boutonlien'] = Accueilserviceitem::formatBoutonLien($data['boutonlien'], $data['title']);
        return $data;
    }
}
