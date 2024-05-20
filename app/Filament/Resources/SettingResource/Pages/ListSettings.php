<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\SettingResource;

class ListSettings extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SettingResource::class;
}
