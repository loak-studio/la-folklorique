<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\LineChartWidget;

class LastTwelveMonthSalesChart extends LineChartWidget
{
    protected function getHeading(): ?string
    {
        return "Nombre de commande sur les 12 derniers mois";
    }

    protected function getMonthSales(int $month, $year): int
    {
        $monthSales = Order::query()->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
        return $monthSales;
    }

    protected function getLastTwelveMonthsSalesData(): array
    {
        $data = [];
        $today = time();
        $months = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre'
        ];
        $lastTwelveMonths = [];
        for ($i = 0; $i < 12; $i++) {
            $month = date('n-Y', $today);
            $date = explode('-', $month);
            $amount = $this->getMonthSales($date[0], $date[1]);
            $lastTwelveMonths[$months[$date[0]]] = $amount;
            $today = strtotime('-1 month', $today);
        }
        $data = array_reverse($lastTwelveMonths);
        // dd($lastTwelveMonths);
        // dd($data);
        return $data;
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Commande',
                    'data' => $this->getLastTwelveMonthsSalesData(),
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
