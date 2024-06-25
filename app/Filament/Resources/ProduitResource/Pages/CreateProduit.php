<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProduitResource;

class CreateProduit extends CreateRecord
{
    protected static string $resource = ProduitResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return serializeButtonurlFunc($data, "/produits/");
    }
}
