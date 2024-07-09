<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class ProductAdminChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Product Chart';

    protected function getData(): array
    {
        $data = Trend::model(Product::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data'  => $data->map(fn(TrendValue $value)  => $value->aggregate),
                    'backgroundColor' => '#36A2EB',

                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels'   => $data->map(fn(TrendValue $value)   => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
