<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected static string $view = 'filament.pages.order';
    public $status;

    protected function getTitle(): string
    {
        return 'Commande n°' . $this->record->id;
    }

    protected function getStatus(): string
    {
        return $this->record->status;
    }

    public function getTranslatedStatus($status): string
    {
        switch ($status) {
            case 'pending':
                return '"En attente"';
                break;
            case 'processing':
                return '"En cours"';
                break;
            case 'cancelled':
                return '"Annulé"';
                break;
            case 'finished':
                return '"Terminé"';
                break;
        }
    }

    public function updateStatus(): void
    {
        $this->notify('success', 'Le statut de la commande a été modifié par' . ' ' . $this->getTranslatedStatus($this->record->status));
    }
}
