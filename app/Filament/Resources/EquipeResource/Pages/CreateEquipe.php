<?php

namespace App\Filament\Resources\EquipeResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\EquipeResource;

class CreateEquipe extends CreateRecord
{
    protected static string $resource = EquipeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/equipes/");
    }
}
