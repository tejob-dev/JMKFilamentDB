<?php

namespace App\Filament\Resources\VideoResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\VideoResource;

class EditVideo extends EditRecord
{
    protected static string $resource = VideoResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return serializeButtonurlFunc($data, "/videos/");
    }
}
