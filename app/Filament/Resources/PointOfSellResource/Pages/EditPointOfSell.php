<?php

namespace App\Filament\Resources\PointOfSellResource\Pages;

use App\Filament\Resources\PointOfSellResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPointOfSell extends EditRecord
{
    protected static string $resource = PointOfSellResource::class;

    protected function getTitle(): string
    {
        return 'Modifier le point de vente : ' . $this->record->name;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Supprimer le point de vente'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
