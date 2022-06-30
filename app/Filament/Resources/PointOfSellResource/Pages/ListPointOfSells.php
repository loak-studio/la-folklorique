<?php

namespace App\Filament\Resources\PointOfSellResource\Pages;

use App\Filament\Resources\PointOfSellResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPointOfSells extends ListRecords
{
    protected static string $resource = PointOfSellResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un point de vente'),
        ];
    }
}
