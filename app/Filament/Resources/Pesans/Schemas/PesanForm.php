<?php

namespace App\Filament\Resources\Pesans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PesanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('kontak')
                    ->required(),
                TextInput::make('subjek'),
                Textarea::make('pesan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
