<?php

namespace App\Filament\Resources\AccueilclientitemResource\Pages;

use App\Models\Accueilclientitem;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AccueilclientitemResource;

class EditAccueilclientitem extends EditRecord
{
    protected static string $resource = AccueilclientitemResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/clients/");
    }
}
