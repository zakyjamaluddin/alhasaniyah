<?php

namespace App\Filament\Resources\Juaras\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JuaraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('juara'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->required(),
                Textarea::make('deskripsi'),
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('foto-juara')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('800'),
                DatePicker::make('tanggal'),

                Toggle::make('show')
                    ->required()
                    ->default(true),
            ]);
    }
}
