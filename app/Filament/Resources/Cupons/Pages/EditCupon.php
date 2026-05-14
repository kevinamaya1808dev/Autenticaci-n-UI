<?php

namespace App\Filament\Resources\Cupons\Pages;

use App\Filament\Resources\Cupons\CuponResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCupon extends EditRecord
{
    protected static string $resource = CuponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
