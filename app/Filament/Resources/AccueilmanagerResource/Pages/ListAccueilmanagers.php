<?php

namespace App\Filament\Resources\AccueilmanagerResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilmanagerResource;

class ListAccueilmanagers extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilmanagerResource::class;
}
