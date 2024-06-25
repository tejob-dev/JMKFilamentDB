<?php

namespace App\Filament\Resources\AccueilmanageritemResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AccueilmanageritemResource;

class EditAccueilmanageritem extends EditRecord
{
    protected static string $resource = AccueilmanageritemResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/managers/");
    }
}
