<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\View\View;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected static string $view = 'filament.pages.order';
    public $status;

    protected function getTitle(): string
    {
        return 'Commande n°' . $this->record->id;
    }


    public function mount($record): void
    {
        static::authorizeResourceAccess();

        $this->record = $this->resolveRecord($record);

        abort_unless(static::getResource()::canView($this->getRecord()), 403);

        $this->status = $this->record->status;

        $this->fillForm();
    }
    public function render(): View
    {
        $this->status = $this->record->status;
        return view(static::$view, $this->getViewData())
            ->layout(static::$layout, $this->getLayoutData());
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

    protected function getActions(): array
    {
        return [
            Action::make('Passer la commande au statut en cours')
                ->action(fn () => $this->updateStatus('processing'))
                ->hidden(fn () => $this->getRecord()->status === 'processing' || $this->getRecord()->status === 'finished' || $this->getRecord()->status === 'cancelled')
                ->color('warning'),
            Action::make('Passer la commande au statut terminée')
                ->action(fn () => $this->updateStatus('finished'))
                ->hidden(fn () => $this->getRecord()->status === 'pending' || $this->getRecord()->status === 'finished' || $this->getRecord()->status === 'cancelled')
                ->color('success'),
            Action::make('Annuler la commande')
                ->action(fn () => $this->updateStatus('cancelled'))
                ->requiresConfirmation()
                ->modalHeading('Annuler la commande')
                ->modalSubheading('Êtes-vous sûr de vouloir annuler cette commande ?')
                ->modalButton('Confirmer')
                ->color('danger')
                ->hidden(fn () => $this->getRecord()->status === 'finished' || $this->getRecord()->status === 'cancelled'),
        ];
    }

    public function updateStatus($case): void
    {
        $this->getRecord()->status = $case;
        $this->getRecord()->save();
        $this->notify('success', 'Le statut de la commande a été modifié');
    }

    public function updatePaid(): void
    {
        $this->record->paid = 1;
        $this->record->save();
        $this->notify('success', 'Le statut de paiment a été modifié');
    }
}
