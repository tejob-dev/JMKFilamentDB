<?php

namespace App\Filament\Resources\AccueilserviceitemResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilserviceitemResource;

class ListAccueilserviceitems extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilserviceitemResource::class;
}
