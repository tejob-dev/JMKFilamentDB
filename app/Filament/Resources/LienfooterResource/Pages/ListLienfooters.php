<?php

namespace App\Filament\Resources\LienfooterResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\LienfooterResource;

class ListLienfooters extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = LienfooterResource::class;
}
