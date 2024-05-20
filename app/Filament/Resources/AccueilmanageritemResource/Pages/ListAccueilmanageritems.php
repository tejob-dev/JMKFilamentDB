<?php

namespace App\Filament\Resources\AccueilmanageritemResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilmanageritemResource;

class ListAccueilmanageritems extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilmanageritemResource::class;
}
