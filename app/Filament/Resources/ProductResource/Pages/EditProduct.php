<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getTitle(): string
    {
        return 'Modifier le produit : ' . $this->record->name;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['price'] = (int) round(str_replace(',', '.', $data['price']) * 100);
        if ($data['old_price'] === null) {
            $data['old_price'] = null;
        } else {
            $data['old_price'] = (int) round(($data['old_price'] * 100));
        }
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['price'] = number_format($data['price'] / 100, 2, ',', '.');
        if ($data['old_price'] === null) {
            $data['old_price'] = null;
        } else {
            $data['old_price'] = number_format($data['old_price'] / 100, 2, ',', '.');
        }
        return $data;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Supprimer le produit'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
