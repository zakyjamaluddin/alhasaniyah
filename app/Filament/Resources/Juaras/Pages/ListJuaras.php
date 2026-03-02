<?php

namespace App\Filament\Resources\Juaras\Pages;

use App\Filament\Resources\Juaras\JuaraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJuaras extends ListRecords
{
    protected static string $resource = JuaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
