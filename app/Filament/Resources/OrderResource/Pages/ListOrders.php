<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array
    {
        return [
            'All'        => Tab::make(),
            'This Week'  => Tab::make()
                ->modifyQueryUsing(fn(Builder $query)  => $query->where('created_at', ">=", now()->subWeek()))
                ->badge(Order::query()->where('created_at', ">=", now()->subWeek())->count()),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', ">=", now()->subMonth()))
                ->badge(Order::query()->where('created_at', ">=", now()->subMonth())->count()),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
