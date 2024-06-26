<?php

namespace App\Filament\Resources\ContactDataResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ContactDataResource;

class ListAllContactData extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ContactDataResource::class;
}
