<?php

namespace App\Filament\Resources\ValeurResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ValeurResource;

class CreateValeur extends CreateRecord
{
    protected static string $resource = ValeurResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/valeurs/");
    }
}
