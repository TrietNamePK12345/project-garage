<?php

namespace App\Filament\Admin\Resources\ProductResource\Pages;

use App\Filament\Admin\Resources\ProductResource\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('Tạo dịch vụ mới')
            ->button()
            ->url(ProductResource::getUrl('create')),
            Actions\Action::make('Quay lại')
            ->button()
            ->url(ProductResource::getUrl('index'))
        ];
    }
}
