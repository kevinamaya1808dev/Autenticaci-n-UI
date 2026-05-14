<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('usuario_id')
                    ->required()
                    ->numeric(),
                TextInput::make('direccion_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('cupon_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('numero_pedido')
                    ->required(),
                Select::make('estatus')
                    ->options([
            'pendiente' => 'Pendiente',
            'pagado' => 'Pagado',
            'en_proceso' => 'En proceso',
            'enviado' => 'Enviado',
            'entregado' => 'Entregado',
            'cancelado' => 'Cancelado',
        ])
                    ->default('pendiente')
                    ->required(),
                Select::make('tipo_entrega')
                    ->options(['domicilio' => 'Domicilio', 'recoleccion' => 'Recoleccion'])
                    ->default('domicilio')
                    ->required(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric(),
                TextInput::make('descuento')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total')
                    ->required()
                    ->numeric(),
                Textarea::make('notas')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
