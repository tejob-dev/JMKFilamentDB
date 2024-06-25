<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProduitResource;

class EditProduit extends EditRecord
{
    protected static string $resource = ProduitResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/produits/");
    }
}
