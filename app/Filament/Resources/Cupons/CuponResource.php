<?php

namespace App\Filament\Resources\Cupons;

use App\Filament\Resources\Cupons\Pages;
use App\Models\Cupon;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class CuponResource extends Resource
{
    protected static ?string $model = Cupon::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Cupones';
    protected static ?string $modelLabel = 'Cupón';
    protected static ?string $pluralModelLabel = 'Cupones';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Section::make('Información del cupón')->schema([
                Forms\Components\TextInput::make('codigo')
                    ->label('Código')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true)
                    ->alphaDash()
                    ->upperCase(),

                Forms\Components\Select::make('tipo')
                    ->options([
                        'porcentaje' => 'Porcentaje (%)',
                        'fijo'       => 'Monto fijo ($)',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                Forms\Components\TextInput::make('monto_minimo')
                    ->label('Monto mínimo de compra')
                    ->numeric()
                    ->prefix('$')
                    ->default(0),

                Forms\Components\TextInput::make('usos_maximos')
                    ->label('Usos máximos')
                    ->numeric()
                    ->minValue(1),

                Forms\Components\DateTimePicker::make('expira_en')
                    ->label('Fecha de expiración'),

                Forms\Components\Toggle::make('activo')
                    ->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'porcentaje' => 'primary',
                        'fijo'       => 'success',
                        default      => 'gray',
                    }),

                Tables\Columns\TextColumn::make('valor')->sortable(),

                Tables\Columns\TextColumn::make('monto_minimo')
                    ->label('Monto mínimo')
                    ->money('MXN')
                    ->sortable(),

                Tables\Columns\TextColumn::make('usos_realizados')
                    ->label('Usos')
                    ->sortable(),

                Tables\Columns\TextColumn::make('expira_en')
                    ->label('Expira')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('activo'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCupons::route('/'),
            'create' => Pages\CreateCupon::route('/create'),
            'edit'   => Pages\EditCupon::route('/{record}/edit'),
        ];
    }
}