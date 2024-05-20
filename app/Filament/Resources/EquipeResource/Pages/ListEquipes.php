<?php

namespace App\Filament\Resources\EquipeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EquipeResource;
use App\Filament\Traits\HasDescendingOrder;

class ListEquipes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EquipeResource::class;
}
