<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\View\View;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected static string $view = 'filament.pages.order';

    public $status;

    public function mount($record): void
    {
        static::authorizeResourceAccess();

        $this->record = $this->resolveRecord($record);

        abort_unless(static::getResource()::canView($this->getRecord()), 403);

        if ($this->getRecord()->status == 'pending') {
            $this->status = 'processing';
        } elseif ($this->getRecord()->status == 'processing') {
            $this->status = 'finished';
        }

        $this->fillForm();
    }

    public function render(): View
    {
        if ($this->getRecord()->status == 'pending') {
            $this->status = 'processing';
        } elseif ($this->getRecord()->status == 'processing') {
            $this->status = 'finished';
        }
        return view(static::$view, $this->getViewData())
            ->layout(static::$layout, $this->getLayoutData());
    }

    protected function getTitle(): string
    {
        return 'Commande n°' . $this->record->id;
    }

    protected function getStatus(): string
    {
        return $this->record->status;
    }

    protected function getSubtotal(): string
    {
        $subtotal = 0;
        foreach ($this->record->items as $item) {
            $subtotal += $item->price * $item->quantity;
        }
        return number_format($subtotal / 100, 2, ',', '.');
    }

    protected function getTranslatedPayementMethod($str): string
    {
        switch ($str) {
            case 'cash':
                return 'Paiment à la livraison';
            case 'transfer':
                return 'Virement';
            case 'stripe':
                return 'Carte bancaire';
            case 'paypal':
                return 'PayPal';
        }
    }

    protected function getTranslatedStatus($str): string
    {
        switch ($str) {
            case 'pending':
                return '"En attente"';
                break;
            case 'processing':
                return '"En cours"';
                break;
            case 'cancelled':
                return '"Annulée"';
                break;
            case 'finished':
                return '"Terminée"';
                break;
        }
    }

    public function updateStatus(): void
    {
        $this->record->status = $this->status;
        $this->record->save();
        $this->notify('success', 'Le statut de la commande a été modifié par' . ' ' . $this->getTranslatedStatus($this->status));
    }

    public function updatePaid(): void
    {
        $this->record->paid = 1;
        $this->record->save();
        $this->notify('success', 'Le statut de paiment a été modifié par "Payée"');
    }
}
