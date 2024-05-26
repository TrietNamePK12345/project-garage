<?php

namespace App\Filament\Admin\Resources\ProductResource\Tables;

use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;

class ProductFilter
{
    public static function fillter()
    {
        return [
           SelectFilter::make('status')
            ->label('Trạng thái')
            ->options([
                '0' => 'Không hoạt động',
                '1' => 'Hoạt động'
            ]),

            Filter::make('created_at')
            ->label('Ngày tạo')
            ->form([
                DatePicker::make('Từ'),
                DatePicker::make('Đến'),
            ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['Từ'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['Đến'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }
}
