<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Closure;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class NotFinishedOrders extends BaseWidget
{
    protected static ?string $heading = "Commandes non-terminées";

    protected function getTableQuery(): Builder
    {
        return Order::where('status', 'pending')
            ->orWhere('status', 'processing');
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->label('Numéro'),
            TextColumn::make('created_at')
                ->dateTime('l d F Y')
                ->prefix('Le ')
                ->label('Date de commande'),
            BooleanColumn::make('paid')
                ->label('Payé'),
            BadgeColumn::make('status')
                ->label('Statut')
                ->enum([
                    'pending' => 'En attente',
                    'processing' => 'En cours',
                    'cancelled' => 'Annulé',
                    'finished' => 'Terminé',
                ])
                ->colors([
                    'warning' => 'processing',
                    'success' => 'finished',
                    'danger' => 'cancelled',
                ]),
        ];
    }
}
