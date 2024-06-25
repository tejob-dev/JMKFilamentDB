<?php

namespace App\Filament\Resources\ImpactResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ImpactResource;

class EditImpact extends EditRecord
{
    protected static string $resource = ImpactResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/impacts/");
    }
}
