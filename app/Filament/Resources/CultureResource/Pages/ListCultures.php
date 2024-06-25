<?php

namespace App\Filament\Resources\CultureResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CultureResource;

class ListCultures extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CultureResource::class;
}
