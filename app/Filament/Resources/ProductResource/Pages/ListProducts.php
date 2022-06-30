<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getTitle(): string
    {
        return 'Tous les produits';
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un produit'),
        ];
    }
}
