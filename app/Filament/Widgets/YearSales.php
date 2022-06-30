<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\LineChartWidget;

class YearSales extends LineChartWidget
{
    protected function getHeading(): ?string
    {
        return "Nombre de commande terminée par mois sur l'année (" . date('Y') . ")";
    }

    protected function getYearSalesData(): array
    {
        $data = [];
        $months = [
            'Janvier' => 1,
            'Février' => 2,
            'Mars' => 3,
            'Avril' => 4,
            'Mai' => 5,
            'Juin' => 6,
            'Juillet' => 7,
            'Août' => 8,
            'Septembre' => 9,
            'Octobre' => 10,
            'Novembre' => 11,
            'Décembre' => 12
        ];
        $year = date('Y');
        foreach ($months as $key => $value) {
            $data[$key] = Order::whereYear('created_at', $year)
                ->whereMonth('created_at', $value)
                ->where('status', 'finished')
                ->count();
        }
        // dd($data);
        return $data;
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Commande',
                    'data' => $this->getYearSalesData(),
                    'fill' => false,
                    'borderColor' => '#e85011',
                    'backgroundColor' => '#e85011',
                    'pointBorderColor' => '#e85011',
                    'pointBackgroundColor' => '#e85011',
                    'pointHoverBackgroundColor' => '#e85011',
                    'pointHoverBorderColor' => '#e85011',
                ],
            ],
        ];
    }
}
