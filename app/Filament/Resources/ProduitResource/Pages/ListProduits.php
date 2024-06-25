<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ProduitResource;

class ListProduits extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ProduitResource::class;
}
