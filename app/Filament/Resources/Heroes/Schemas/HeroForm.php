<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Hero Content')
                    ->schema([
                        TextInput::make('info')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('heading_1')
                            ->label('Heading')
                            ->required(),

                        TextInput::make('heading_2')
                            ->label('Heading Accent'),

                        Textarea::make('sub_heading')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Features')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('feature_1'),
                                TextInput::make('description_1'),

                                TextInput::make('feature_2'),
                                TextInput::make('description_2'),

                                TextInput::make('feature_3'),
                                TextInput::make('description_3'),
                            ]),
                    ]),

                Section::make('Hero Image')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('hero')
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth(1200)
                            ->imageResizeTargetHeight(900)
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Popup Content')
                    ->schema([
                        TextInput::make('popup_header'),
                        TextInput::make('popup_description'),
                    ])
                    ->columns(2),

            ]);
    }
}
