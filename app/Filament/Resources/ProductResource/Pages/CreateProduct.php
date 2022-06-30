<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getTitle(): string
    {
        return 'Créer un produit';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['price'] = (int) round(($data['price'] * 100));
        if ($data['old_price'] === null) {
            $data['old_price'] = null;
        } else {
            $data['old_price'] = (int) round(($data['old_price'] * 100));
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
