<?php

namespace App\Filament\Resources\AccueilaboutResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilaboutResource;

class ListAccueilabouts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilaboutResource::class;
}
