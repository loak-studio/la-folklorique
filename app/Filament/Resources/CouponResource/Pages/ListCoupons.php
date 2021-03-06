<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoupons extends ListRecords
{
    protected static string $resource = CouponResource::class;

    protected function getTitle(): string
    {
        return 'Tous les codes promo';
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un code promo'),
        ];
    }
}
