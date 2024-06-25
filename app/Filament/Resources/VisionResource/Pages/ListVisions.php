<?php

namespace App\Filament\Resources\VisionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\VisionResource;
use App\Filament\Traits\HasDescendingOrder;

class ListVisions extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = VisionResource::class;
}
