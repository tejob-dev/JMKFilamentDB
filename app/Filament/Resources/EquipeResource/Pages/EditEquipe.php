<?php

namespace App\Filament\Resources\EquipeResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\EquipeResource;

class EditEquipe extends EditRecord
{
    protected static string $resource = EquipeResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/equipes/");
    }
}
