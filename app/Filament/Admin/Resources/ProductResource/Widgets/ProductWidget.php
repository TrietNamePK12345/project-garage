<?php

namespace App\Filament\Admin\Resources\ProductResource\Widgets;

use App\Filament\Admin\Resources\ProductResource\Pages\ListProducts;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;
use Filament\Support\Enums\IconPosition;
class ProductWidget extends BaseWidget
{
    protected function getTablePage():array
    {
        return ListProducts::class;
    }
    protected function getStats(): array
    {
        $productIds = Product::pluck('id');
        return [
            Stat::make('Tổng sản phẩm dịch vụ', $productIds->count())
                ->description('Dịch vụ đã có')
                ->descriptionIcon('heroicon-m-building-storefront', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 50])
                ->color('success'),

            Stat::make('Tổng giá trị', number_format(Product::sum('price'), 0,',','.') . ' đ')
            ->description('Tổng giá trị của tất cả dịch vụ')
            ->descriptionIcon('heroicon-m-cube-transparent', IconPosition::Before)
            ->chart([1, 3, 5, 10, 20, 50])
            ->color('warning'),
        ];
    }
}
