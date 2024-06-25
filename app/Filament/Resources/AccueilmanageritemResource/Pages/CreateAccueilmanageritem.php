<?php

namespace App\Filament\Resources\AccueilmanageritemResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AccueilmanageritemResource;

class CreateAccueilmanageritem extends CreateRecord
{
    protected static string $resource = AccueilmanageritemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/managers/");
    }
}
