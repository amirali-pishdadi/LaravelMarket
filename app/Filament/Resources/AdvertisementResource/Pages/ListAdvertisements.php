<?php

namespace App\Filament\Resources\AdvertisementResource\Pages;

use App\Filament\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAdvertisements extends ListRecords
{

    public function getTabs(): array
    {
        return [
            'All'        => Tab::make(),
            'This Week'  => Tab::make()
                ->modifyQueryUsing(fn(Builder $query)  => $query->where('created_at', ">=", now()->subWeek()))
                ->badge(Advertisement::query()->where('created_at', ">=", now()->subWeek())->count()),
            'This Month' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', ">=", now()->subMonth()))
                ->badge(Advertisement::query()->where('created_at', ">=", now()->subMonth())->count()),
        ];
    }
    protected static string $resource = AdvertisementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
