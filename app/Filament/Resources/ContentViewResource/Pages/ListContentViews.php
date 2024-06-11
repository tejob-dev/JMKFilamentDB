<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ContentViewResource;

class ListContentViews extends ListRecords
{
    // use HasDescendingOrder;

    protected static string $resource = ContentViewResource::class;
}
