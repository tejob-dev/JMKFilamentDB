<?php

namespace App\Filament\Resources\FormationResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\FormationResource;

class CreateFormation extends CreateRecord
{
    protected static string $resource = FormationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/formations/");
    }
}
