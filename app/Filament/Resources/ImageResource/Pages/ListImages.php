<?php

namespace App\Filament\Resources\ImageResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ImageResource;
use App\Filament\Traits\HasDescendingOrder;

class ListImages extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ImageResource::class;
}
