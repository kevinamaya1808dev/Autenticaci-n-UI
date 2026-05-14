<?php

namespace App\Filament\Resources\Cupons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CuponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required(),
                Select::make('tipo')
                    ->options(['porcentaje' => 'Porcentaje', 'fijo' => 'Fijo'])
                    ->required(),
                TextInput::make('valor')
                    ->required()
                    ->numeric(),
                TextInput::make('monto_minimo')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('usos_maximos')
                    ->numeric()
                    ->default(null),
                TextInput::make('usos_realizados')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('expira_en'),
                Toggle::make('activo')
                    ->required(),
            ]);
    }
}
