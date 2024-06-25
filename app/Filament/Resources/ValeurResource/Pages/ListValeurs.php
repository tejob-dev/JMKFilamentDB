<?php

namespace App\Filament\Resources\ValeurResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ValeurResource;
use App\Filament\Traits\HasDescendingOrder;

class ListValeurs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ValeurResource::class;
}
