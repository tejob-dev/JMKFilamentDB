<?php

namespace App\Filament\Resources\MissionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MissionResource;

class CreateMission extends CreateRecord
{
    protected static string $resource = MissionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/missions/");
    }
}
