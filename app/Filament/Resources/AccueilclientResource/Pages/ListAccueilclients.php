<?php

namespace App\Filament\Resources\AccueilclientResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilclientResource;

class ListAccueilclients extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilclientResource::class;
}
