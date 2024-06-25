<?php

namespace App\Filament\Resources\VisionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\VisionResource;

class CreateVision extends CreateRecord
{
    protected static string $resource = VisionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/visions/");
    }
}
