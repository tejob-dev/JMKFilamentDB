<?php

namespace App\Filament\Resources\AccueilactuResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilactuResource;

class ListAccueilactus extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilactuResource::class;
}
