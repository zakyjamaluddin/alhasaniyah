<?php

namespace App\Filament\Resources\Alumnis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AlumniForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('profesi'),
                TextInput::make('angkatan'),
                Textarea::make('kata_kata')
                    ->columnSpanFull(),

                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('foto-alumni')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('800'),
            ]);
    }
}
