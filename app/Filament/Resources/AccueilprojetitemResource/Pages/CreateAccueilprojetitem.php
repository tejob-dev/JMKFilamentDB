<?php

namespace App\Filament\Resources\AccueilprojetitemResource\Pages;

use App\Models\Accueilprojetitem;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AccueilprojetitemResource;

class CreateAccueilprojetitem extends CreateRecord
{
    protected static string $resource = AccueilprojetitemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/projets/");
    }
}
