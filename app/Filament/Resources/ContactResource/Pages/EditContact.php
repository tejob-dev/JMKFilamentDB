<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ContactResource;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;
}
