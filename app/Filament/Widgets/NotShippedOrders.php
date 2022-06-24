<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Closure;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class NotShippedOrders extends BaseWidget
{
    protected static ?string $heading = "Commandes non-envoyées";

    protected function getTableQuery(): Builder
    {
        return Order::query()->where('has_been_send', false);
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record]);
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
        ];
    }
}
