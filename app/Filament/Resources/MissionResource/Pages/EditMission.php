<?php

namespace App\Filament\Resources\MissionResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\MissionResource;

class EditMission extends EditRecord
{
    protected static string $resource = MissionResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/missions/");
    }
}
