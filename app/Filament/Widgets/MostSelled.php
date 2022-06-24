<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class MostSelled extends BaseWidget
{
    protected function getMostSelled(): array
    {
        foreach (OrderItem::all() as $orderItem) {
            $products[] = [
                'product' => $orderItem->product_id,
                'quantity' => $orderItem->quantity
            ];
        }
        $merged = array_reduce($products, function ($carry, $item) {
            if (isset($carry[$item['product']])) {
                $carry[$item['product']] += $item['quantity'];
            } else {
                $carry[$item['product']] = $item['quantity'];
            }
            return $carry;
        }, []);
        $mostSelledName = Product::find(array_search(max($merged), $merged))->name;
        $mostSelledQuantity = $merged[array_search(max($merged), $merged)];
        $mostSelled[] = [
            'name' => $mostSelledName,
            'quantity' => $mostSelledQuantity
        ];
        return $mostSelled;
    }


    protected function getCards(): array
    {
        return [
            Card::make('Produit le plus vendu', $this->getMostSelled()[0]['name'] . " x" . $this->getMostSelled()[0]['quantity'])
                ->color('danger'),
        ];
    }
}
