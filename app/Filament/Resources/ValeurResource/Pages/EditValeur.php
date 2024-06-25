<?php

namespace App\Filament\Resources\ValeurResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ValeurResource;

class EditValeur extends EditRecord
{
    protected static string $resource = ValeurResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/valeurs/");
    }
}
