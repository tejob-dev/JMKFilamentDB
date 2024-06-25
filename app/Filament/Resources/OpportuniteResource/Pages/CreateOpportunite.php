<?php

namespace App\Filament\Resources\OpportuniteResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\OpportuniteResource;

class CreateOpportunite extends CreateRecord
{
    protected static string $resource = OpportuniteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/opportunites/");
    }
}
