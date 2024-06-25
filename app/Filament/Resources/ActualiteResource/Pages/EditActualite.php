<?php

namespace App\Filament\Resources\ActualiteResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ActualiteResource;

class EditActualite extends EditRecord
{
    protected static string $resource = ActualiteResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/actualites/");
    }
}
