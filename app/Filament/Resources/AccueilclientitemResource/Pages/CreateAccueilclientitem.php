<?php

namespace App\Filament\Resources\AccueilclientitemResource\Pages;

use App\Models\Accueilclientitem;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AccueilclientitemResource;

class CreateAccueilclientitem extends CreateRecord
{
    protected static string $resource = AccueilclientitemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/clients/");
    }
}
