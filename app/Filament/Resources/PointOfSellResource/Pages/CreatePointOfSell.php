<?php

namespace App\Filament\Resources\PointOfSellResource\Pages;

use App\Filament\Resources\PointOfSellResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePointOfSell extends CreateRecord
{
    protected static string $resource = PointOfSellResource::class;

    protected function getTitle(): string
    {
        return 'Créer un point de vente';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
