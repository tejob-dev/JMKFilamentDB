<?php

namespace App\Filament\Resources\SlideResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SlideResource;
use App\Filament\Traits\HasDescendingOrder;

class ListSlides extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SlideResource::class;
}
