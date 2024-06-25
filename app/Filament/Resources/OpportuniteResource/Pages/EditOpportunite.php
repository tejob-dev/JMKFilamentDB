<?php

namespace App\Filament\Resources\OpportuniteResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OpportuniteResource;

class EditOpportunite extends EditRecord
{
    protected static string $resource = OpportuniteResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/opportunites/");
    }
}
