<?php

namespace App\Filament\Resources\SantriBarus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SantriBaruForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nisn'),
                TextInput::make('asal_sekolah'),
                TextInput::make('nama_orang_tua'),
                Textarea::make('alamat_lengkap')
                    ->columnSpanFull(),
                TextInput::make('nomor_hp'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'diverifikasi' => 'Diverifikasi',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak',
        ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
