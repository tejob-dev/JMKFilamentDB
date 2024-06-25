<?php

namespace App\Filament\Resources\FormationResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\FormationResource;

class EditFormation extends EditRecord
{
    protected static string $resource = FormationResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/formations/");
    }
}
