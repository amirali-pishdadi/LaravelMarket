<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class UserAdminChart extends ChartWidget
{
    protected static ?string $heading = 'User Chart';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label'           => 'Users',
                    'data'            => $data->map(fn(TrendValue $value)            => $value->aggregate),
                    'backgroundColor' => '#36A2EB',

                    'borderColor'     => '#9BD0F5',
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
