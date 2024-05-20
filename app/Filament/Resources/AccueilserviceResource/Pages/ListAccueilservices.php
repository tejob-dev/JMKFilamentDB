<?php

namespace App\Filament\Resources\AccueilserviceResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilserviceResource;

class ListAccueilservices extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilserviceResource::class;
}
