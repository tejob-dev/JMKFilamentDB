<?php

namespace App\Filament\Resources\ImpactResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ImpactResource;

class CreateImpact extends CreateRecord
{
    protected static string $resource = ImpactResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/impacts/");
    }
}
