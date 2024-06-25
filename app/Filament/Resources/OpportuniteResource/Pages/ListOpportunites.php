<?php

namespace App\Filament\Resources\OpportuniteResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\OpportuniteResource;

class ListOpportunites extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = OpportuniteResource::class;
}
