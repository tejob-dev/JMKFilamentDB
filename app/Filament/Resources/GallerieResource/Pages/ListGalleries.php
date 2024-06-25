<?php

namespace App\Filament\Resources\GallerieResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\GallerieResource;

class ListGalleries extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = GallerieResource::class;
}
