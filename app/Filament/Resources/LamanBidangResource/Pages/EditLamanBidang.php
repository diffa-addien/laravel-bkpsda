<?php

namespace App\Filament\Resources\LamanBidangResource\Pages;

use App\Filament\Resources\LamanBidangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLamanBidang extends EditRecord
{
    protected static string $resource = LamanBidangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
