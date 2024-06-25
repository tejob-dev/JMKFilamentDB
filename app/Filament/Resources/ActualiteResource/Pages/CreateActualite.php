<?php

namespace App\Filament\Resources\ActualiteResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ActualiteResource;

class CreateActualite extends CreateRecord
{
    protected static string $resource = ActualiteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/services/");
    }
}
