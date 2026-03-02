<?php

namespace App\Filament\Resources\Pengumumen;

use App\Filament\Resources\Pengumumen\Pages\ManagePengumumen;
use App\Models\Pengumuman;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengumuman')
                ->schema([

                    TextInput::make('judul')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('deskripsi')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    DatePicker::make('tanggal')
                        ->label('Tanggal Pengumuman')
                        ->native(false)
                        ->nullable(),

                ])
                ->columns(2),

            Section::make('Dokumen Lampiran')
                ->schema([

                    FileUpload::make('dokumen')
                        ->disk('public')
                        ->directory('pengumuman')
                        ->acceptedFileTypes([
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        ])
                        ->maxSize(2048) // 2MB
                        ->downloadable()
                        ->openable()
                        ->nullable(),

                ]),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                ->searchable()
                ->sortable()
                ->limit(40),

                TextColumn::make('deskripsi')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('dokumen')
                    ->label('Download')
                    ->formatStateUsing(fn ($state) => $state ? 'Download' : '-')
                    ->url(fn ($record) => $record->dokumen
                        ? asset('storage/' . $record->dokumen)
                        : null
                    )
                    ->openUrlInNewTab(),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePengumumen::route('/'),
        ];
    }
}
