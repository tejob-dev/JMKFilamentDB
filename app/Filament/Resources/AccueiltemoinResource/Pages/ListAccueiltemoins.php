<?php

namespace App\Filament\Resources\AccueiltemoinResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueiltemoinResource;

class ListAccueiltemoins extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueiltemoinResource::class;
}
