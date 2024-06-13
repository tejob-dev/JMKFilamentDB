<?php

namespace App\Filament\Resources\CompositeViewResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CompositeViewResource;

class ListCompositeViews extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CompositeViewResource::class;
}
