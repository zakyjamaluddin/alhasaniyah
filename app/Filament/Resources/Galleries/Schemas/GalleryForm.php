<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth(1200)
                    ->imageResizeTargetHeight(900)
                    ->required(), // Maksimal ukuran file dalam KB,

                Textarea::make('deskripsi'),
            ]);
    }
}
