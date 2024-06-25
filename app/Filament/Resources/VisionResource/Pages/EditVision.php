<?php

namespace App\Filament\Resources\VisionResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\VisionResource;

class EditVision extends EditRecord
{
    protected static string $resource = VisionResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/visions/");
    }
}
