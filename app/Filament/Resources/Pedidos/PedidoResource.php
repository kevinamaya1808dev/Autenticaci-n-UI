<?php

namespace App\Filament\Resources\Pedidos;

use App\Filament\Resources\Pedidos\Pages;
use App\Models\Pedido;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class PedidoResource extends Resource
{
    protected static ?string $model = Pedido::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Pedidos';
    protected static ?string $modelLabel = 'Pedido';
    protected static ?string $pluralModelLabel = 'Pedidos';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Section::make('Información del pedido')->schema([
                Forms\Components\TextInput::make('numero_pedido')
                    ->label('Número de pedido')
                    ->disabled(),

                Forms\Components\Select::make('estatus')
                    ->options([
                        'pendiente'   => 'Pendiente',
                        'pagado'      => 'Pagado',
                        'en_proceso'  => 'En proceso',
                        'enviado'     => 'Enviado',
                        'entregado'   => 'Entregado',
                        'cancelado'   => 'Cancelado',
                    ])
                    ->required(),

                Forms\Components\Select::make('tipo_entrega')
                    ->label('Tipo de entrega')
                    ->options([
                        'domicilio'    => 'Domicilio',
                        'recoleccion'  => 'Recolección en tienda',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('notas')
                    ->label('Notas')
                    ->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Resumen económico')->schema([
                Forms\Components\TextInput::make('subtotal')
                    ->numeric()
                    ->prefix('$')
                    ->disabled(),

                Forms\Components\TextInput::make('descuento')
                    ->numeric()
                    ->prefix('$')
                    ->disabled(),

                Forms\Components\TextInput::make('total')
                    ->numeric()
                    ->prefix('$')
                    ->disabled(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero_pedido')
                    ->label('# Pedido')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('usuario.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('estatus')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente'  => 'warning',
                        'pagado'     => 'success',
                        'en_proceso' => 'primary',
                        'enviado'    => 'info',
                        'entregado'  => 'success',
                        'cancelado'  => 'danger',
                        default      => 'gray',
                    }),

                Tables\Columns\TextColumn::make('tipo_entrega')
                    ->label('Entrega')
                    ->badge(),

                Tables\Columns\TextColumn::make('total')
                    ->money('MXN')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('estatus')
                    ->options([
                        'pendiente'  => 'Pendiente',
                        'pagado'     => 'Pagado',
                        'en_proceso' => 'En proceso',
                        'enviado'    => 'Enviado',
                        'entregado'  => 'Entregado',
                        'cancelado'  => 'Cancelado',
                    ]),
                Tables\Filters\SelectFilter::make('tipo_entrega')
                    ->label('Tipo de entrega')
                    ->options([
                        'domicilio'   => 'Domicilio',
                        'recoleccion' => 'Recolección',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPedidos::route('/'),
            'edit'  => Pages\EditPedido::route('/{record}/edit'),
        ];
    }
}