<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Tables;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class EmployeeFilter
{
    public static function filters(): array
    {
        return [
            SelectFilter::make('status')
                ->label('Trạng thái')
                ->options([
                    '0' => 'Không hoạt động',
                    '1' => 'Hoạt động'
                ]),

            SelectFilter::make('branch')
                ->label('Chọn chi nhánh')
                ->relationship('branch', 'name')
                ->preload(),

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
