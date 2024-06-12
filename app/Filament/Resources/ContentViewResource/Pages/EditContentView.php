<?php

namespace App\Filament\Resources\ContentViewResource\Pages;

use App\Models\ContentView;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ContentViewResource;

class EditContentView extends EditRecord
{
    protected static string $resource = ContentViewResource::class;

}
