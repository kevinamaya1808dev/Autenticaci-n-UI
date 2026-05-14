<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('descripcion')
                    ->default(null),
                TextInput::make('imagen')
                    ->default(null),
                Toggle::make('activo')
                    ->required(),
            ]);
    }
}
