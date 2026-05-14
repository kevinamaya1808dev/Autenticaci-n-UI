<?php

namespace App\Filament\Resources\Cupons\Pages;

use App\Filament\Resources\Cupons\CuponResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCupons extends ListRecords
{
    protected static string $resource = CuponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
