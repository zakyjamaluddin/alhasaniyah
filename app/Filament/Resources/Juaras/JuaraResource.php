<?php

namespace App\Filament\Resources\Juaras;

use App\Filament\Resources\Juaras\Pages\CreateJuara;
use App\Filament\Resources\Juaras\Pages\EditJuara;
use App\Filament\Resources\Juaras\Pages\ListJuaras;
use App\Filament\Resources\Juaras\Schemas\JuaraForm;
use App\Filament\Resources\Juaras\Tables\JuarasTable;
use App\Models\Juara;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JuaraResource extends Resource
{
    protected static ?string $model = Juara::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTrophy;

    public static function form(Schema $schema): Schema
    {
        return JuaraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JuarasTable::configure($table);
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
            'index' => ListJuaras::route('/'),
        ];
    }
}
