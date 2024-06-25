<?php

namespace App\Filament\Resources\MissionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\MissionResource;

class ListMissions extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = MissionResource::class;
}
