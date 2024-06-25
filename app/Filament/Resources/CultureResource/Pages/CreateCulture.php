<?php

namespace App\Filament\Resources\CultureResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CultureResource;

class CreateCulture extends CreateRecord
{
    protected static string $resource = CultureResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/cultures/");
    }
}
