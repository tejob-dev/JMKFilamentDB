<?php

namespace App\Filament\Resources\AccueilvideoResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AccueilvideoResource;

class ListAccueilvideos extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AccueilvideoResource::class;
}
