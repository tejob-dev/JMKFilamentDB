<?php

namespace App\Filament\Resources\AccueilprojetitemResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilprojetitemResource;

class ListAccueilprojetitems extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilprojetitemResource::class;
}
