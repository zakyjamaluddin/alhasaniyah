<?php

namespace App\Filament\Resources\Pesans;

use App\Filament\Resources\Pesans\Pages\CreatePesan;
use App\Filament\Resources\Pesans\Pages\EditPesan;
use App\Filament\Resources\Pesans\Pages\ListPesans;
use App\Filament\Resources\Pesans\Schemas\PesanForm;
use App\Filament\Resources\Pesans\Tables\PesansTable;
use App\Models\Pesan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftEllipsis;

    public static function form(Schema $schema): Schema
    {
        return PesanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesansTable::configure($table);
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
            'index' => ListPesans::route('/'),
        ];
    }
}
