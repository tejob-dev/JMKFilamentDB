<?php

namespace App\Filament\Resources\ContentViewTypeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ContentViewTypeResource;

class ListContentViewTypes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ContentViewTypeResource::class;
}
