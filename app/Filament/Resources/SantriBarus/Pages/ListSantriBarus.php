<?php

namespace App\Filament\Resources\SantriBarus\Pages;

use App\Filament\Resources\SantriBarus\SantriBaruResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSantriBarus extends ListRecords
{
    protected static string $resource = SantriBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
