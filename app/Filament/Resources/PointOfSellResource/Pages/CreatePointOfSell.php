<?php

namespace App\Filament\Resources\PointOfSellResource\Pages;

use App\Filament\Resources\PointOfSellResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePointOfSell extends CreateRecord
{
    protected static string $resource = PointOfSellResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
