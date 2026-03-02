<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
    ->components([
        Wizard::make([

            Step::make('Informasi Dasar')
                ->schema([
                    TextInput::make('nama')
                        ->label('Nama Lembaga')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('tagline')
                        ->required()
                        ->maxLength(255),

                    Textarea::make('deskripsi')
                        ->rows(4)
                        ->required(),
                ]),

            Step::make('Identitas & Kontak')
                ->schema([
                    FileUpload::make('logo')
                        ->image()
                        ->directory('logo')
                        ->imageEditor()
                        ->maxSize(500)
                        ->required(),

                    Textarea::make('alamat')
                        ->rows(3)
                        ->required(),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required(),

                    TextInput::make('telepon')
                        ->tel()
                        ->required(),
                ]),

            Step::make('Media Sosial')
                ->schema([
                    TextInput::make('instagram')
                        ->url()
                        ->prefix('https://')
                        ->required(),

                    TextInput::make('facebook')
                        ->url()
                        ->prefix('https://')
                        ->required(),

                    TextInput::make('tiktok')
                        ->url()
                        ->prefix('https://')
                        ->required(),

                    TextInput::make('youtube')
                        ->url()
                        ->prefix('https://')
                        ->required(),
                ]),

            Step::make('Profil Lembaga')
                ->schema([
                    TextInput::make('link_maps')
                        ->label('Link Google Maps')
                        ->url()
                        ->required(),

                    Textarea::make('sejarah')
                        ->rows(4)
                        ->required(),

                    Textarea::make('visi')
                        ->rows(3)
                        ->required(),

                    Repeater::make('musi')
                    ->label('Misi')
                        ->relationship() // otomatis pakai relasi misi()
                        ->schema([
                            Textarea::make('misi')
                                ->label('Misi')
                                ->required()
                                ->rows(2),
                        ])
                        ->addActionLabel('Tambah Misi')
                        ->reorderable()
                        ->collapsible()
                        ->defaultItems(1)
                        ->columnSpanFull(),
                ]),
        ])
        ->columnSpanFull(),
    ]);
    }
}
