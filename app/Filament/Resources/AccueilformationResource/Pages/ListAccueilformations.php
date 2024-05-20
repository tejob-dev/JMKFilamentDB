<?php

namespace App\Filament\Resources\AccueilformationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilformationResource;

class ListAccueilformations extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilformationResource::class;
}
