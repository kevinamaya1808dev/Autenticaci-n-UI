<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('categoria_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('precio')
                    ->required()
                    ->numeric(),
                TextInput::make('precio_oferta')
                    ->numeric()
                    ->default(null),
                TextInput::make('existencia')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('activo')
                    ->required(),
                Toggle::make('destacado')
                    ->required(),
            ]);
    }
}
