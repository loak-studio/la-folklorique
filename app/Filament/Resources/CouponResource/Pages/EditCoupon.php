<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoupon extends EditRecord
{
    protected static string $resource = CouponResource::class;

    protected function getTitle(): string
    {
        return 'Modifier le code promo : ' . $this->record->code;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['free_shipping']) {
            $data['value'] = 0;
        } else {
            $data['value'] == number_format($this->record->value / 100, 2, ',', ' ')
                ? $data['value'] = $this->record->value
                : $data['value'] = (float) $data['value'] * 100;
        }
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['value'] = number_format($data['value'] / 100, 2, ',', ' ');
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Supprimer le code promo'),
        ];
    }
}
