<?php

namespace App\Filament\Admin\Resources\CustomerResource\Pages;

use App\Filament\Admin\Resources\CustomerResource\CustomerResource;
use App\Models\Customer;
use Filament\Actions;

use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Tất cả' => Tab::make(),
            'Tuần này' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '>=', now()->subWeek()))
            ->badge(Customer::query()->where('created_at', '>=', now()->subWeek())->count()),
            'Tháng này' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '>=', now()->subMonth()))
            ->badge(Customer::query()->where('created_at', '>=', now()->subMonth())->count()),
            'Năm này' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '>=', now()->subYear()))
            ->badge(Customer::query()->where('created_at', '>=', now()->subYear())->count())
        ];
    }
}
