<?php

namespace App\Filament\Resources\ActualiteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ActualiteResource;

class ListActualites extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ActualiteResource::class;
}
