<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ContentViewResource;
use App\Models\ContentView;


class CreateContentView extends CreateRecord
{
    protected static string $resource = ContentViewResource::class;

}
