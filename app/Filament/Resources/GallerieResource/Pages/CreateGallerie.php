<?php

namespace App\Filament\Resources\GallerieResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\GallerieResource;

class CreateGallerie extends CreateRecord
{
    protected static string $resource = GallerieResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/galleries/");
    }
}
