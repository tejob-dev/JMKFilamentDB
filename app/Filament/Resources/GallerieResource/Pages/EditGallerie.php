<?php

namespace App\Filament\Resources\GallerieResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GallerieResource;

class EditGallerie extends EditRecord
{
    protected static string $resource = GallerieResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/galleries/");
    }
}
