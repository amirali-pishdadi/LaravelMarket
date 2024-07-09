<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::query()->count())
                ->description('All users who register in website')
                ->color('success'),
            Stat::make('Products', Product::query()->count())
                ->description('All products made in website')
                ->color('success'),
            Stat::make('Orders', Order::query()->where("is_paid" , true)->count())
                ->description('finished orders')
                ->color('success'),
        ];
    }
}
