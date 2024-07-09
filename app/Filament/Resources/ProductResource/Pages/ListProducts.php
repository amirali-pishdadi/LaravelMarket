<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
        public function getTabs(): array
    {
        return [
            'All'      => Tab::make(),
            'This Week'   => Tab::make()
                ->modifyQueryUsing(fn(Builder $query)   => $query->where('created_at' , ">=", now()->subWeek()))
                ->badge(Product::query()->where('created_at', ">=", now()->subWeek())->count()),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', ">=", now()->subMonth()))
                ->badge(Product::query()->where('created_at', ">=", now()->subMonth())->count()),
        ];
    }
    
}
