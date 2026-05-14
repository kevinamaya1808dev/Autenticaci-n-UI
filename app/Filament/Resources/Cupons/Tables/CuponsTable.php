<?php

namespace App\Filament\Resources\Cupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CuponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo')
                    ->searchable(),
                TextColumn::make('tipo')
                    ->badge(),
                TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('monto_minimo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('usos_maximos')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('usos_realizados')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('expira_en')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
