<?php

namespace App\Filament\Resources\ImpactResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ImpactResource;
use App\Filament\Traits\HasDescendingOrder;

class ListImpacts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ImpactResource::class;
}
