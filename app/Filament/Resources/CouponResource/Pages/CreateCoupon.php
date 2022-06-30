<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCoupon extends CreateRecord
{
    protected static string $resource = CouponResource::class;

    protected function getTitle(): string
    {
        return 'Créer un code promo';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['value'])) {
            $data['value'] = (int) round(($data['value'] * 100));
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
