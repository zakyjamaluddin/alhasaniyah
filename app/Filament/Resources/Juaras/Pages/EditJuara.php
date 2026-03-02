<?php

namespace App\Filament\Resources\Juaras\Pages;

use App\Filament\Resources\Juaras\JuaraResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJuara extends EditRecord
{
    protected static string $resource = JuaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
