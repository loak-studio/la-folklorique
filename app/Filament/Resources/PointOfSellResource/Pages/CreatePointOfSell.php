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
        if ($this->record->latitude == 0 && $this->record->longitude == 0) {
            $this->notify('danger', 'Adresse non reconnue par le systeme');
            return $this->getResource()::getUrl('edit', $this->record->id);
        } else {
            return $this->getResource()::getUrl('index');
        }
    }
}
