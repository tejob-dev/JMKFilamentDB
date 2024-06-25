<?php

namespace App\Filament\Resources\CultureResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CultureResource;

class EditCulture extends EditRecord
{
    protected static string $resource = CultureResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/cultures/");
    }
}
