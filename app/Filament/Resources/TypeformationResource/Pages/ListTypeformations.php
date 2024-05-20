<?php

namespace App\Filament\Resources\TypeformationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeformationResource;

class ListTypeformations extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeformationResource::class;
}
