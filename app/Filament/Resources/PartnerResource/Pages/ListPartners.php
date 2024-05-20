<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\PartnerResource;

class ListPartners extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PartnerResource::class;
}
