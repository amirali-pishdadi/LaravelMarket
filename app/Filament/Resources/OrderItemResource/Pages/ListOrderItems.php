<?php

namespace App\Filament\Resources\OrderItemResource\Pages;

use App\Filament\Resources\OrderItemResource;
use App\Models\OrderItem;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemResource::class;

    public function getTabs(): array
    {
        return [
            'All'        => Tab::make(),
            'This Week'  => Tab::make()
                ->modifyQueryUsing(fn(Builder $query)  => $query->where('created_at', ">=", now()->subWeek()))
                ->badge(OrderItem::query()->where('created_at', ">=", now()->subWeek())->count()),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', ">=", now()->subMonth()))
                ->badge(OrderItem::query()->where('created_at', ">=", now()->subMonth())->count()),
        ];
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
