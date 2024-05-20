<?php

namespace App\Filament\Resources\AccueilclientitemResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilclientitemResource;

class ListAccueilclientitems extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilclientitemResource::class;
}
