<?php

namespace App\Filament\Admin\Resources\ProductResource\Tables;

use App\Filament\Admin\Resources\ProductResource\Actions\ProductAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
class ProductTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Tên dịch vụ')
                ->searchable()
                ->sortable()
                ->alignCenter(),

                ImageColumn::make('image_url')
                ->label('Ảnh')
                ->alignCenter()
                ->square()
                ->width(80)
                ->height(80),

                TextColumn::make('price')
                ->label('Giá')
                ->sortable()
                ->searchable()
                ->alignCenter()
                ->numeric(decimalPlaces: 0),

                TextColumn::make('category.category_name')
                ->label('Loại dịch vụ')
                ->sortable()
                ->searchable()
                ->alignCenter(),

                TextColumn::make('created_at')
                ->label('Xuất bản')
                ->dateTime()
                ->alignCenter()
                ->sortable(),

                ToggleColumn::make('status')
                ->label('Trạng thái')
                ->searchable()
                ->alignCenter()
                ->sortable()
                ->onIcon('heroicon-m-bolt')
                ->offIcon('heroicon-m-bolt-slash')
                ->onColor('success')
                ->offColor('danger')
            ])
            ->filters(ProductFilter::fillter())
            ->actions(ProductAction::action())
            ->bulkActions(ProductAction::bulkActions());
    }

}
