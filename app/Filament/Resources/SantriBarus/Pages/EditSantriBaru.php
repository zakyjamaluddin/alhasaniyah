<?php

namespace App\Filament\Resources\SantriBarus\Pages;

use App\Filament\Resources\SantriBarus\SantriBaruResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSantriBaru extends EditRecord
{
    protected static string $resource = SantriBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
