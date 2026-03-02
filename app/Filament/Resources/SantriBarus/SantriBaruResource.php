<?php

namespace App\Filament\Resources\SantriBarus;

use App\Filament\Resources\SantriBarus\Pages\CreateSantriBaru;
use App\Filament\Resources\SantriBarus\Pages\EditSantriBaru;
use App\Filament\Resources\SantriBarus\Pages\ListSantriBarus;
use App\Filament\Resources\SantriBarus\Schemas\SantriBaruForm;
use App\Filament\Resources\SantriBarus\Tables\SantriBarusTable;
use App\Models\SantriBaru;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SantriBaruResource extends Resource
{
    protected static ?string $model = SantriBaru::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    public static function form(Schema $schema): Schema
    {
        return SantriBaruForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SantriBarusTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSantriBarus::route('/'),
        ];
    }
}
