<?php

namespace App\Filament\Admin\Resources\CustomerResource\Tables;

use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Carbon\Carbon;

class CustomerFilter
{
    public static function filters(): array
    {
        return [
            SelectFilter::make('status')
               ->label('Trạng thái hoạt động')
               ->options([
                  0 => 'Dừng hoạt động',
                  1 => 'Hoạt động'
               ]),

            Filter::make('created_at')
                ->label('Khoảng thời gian')
                ->translateLabel()
                ->form([
                    DatePicker::make('Từ'),
                    DatePicker::make('Đến'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['Từ'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['Đến'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
                ->indicateUsing(function (array $data): array {
                    $indicators = [];

                    if ($data['Từ'] ?? null) {
                        $indicators['Từ'] = 'Tạo từ ngày ' . Carbon::parse($data['Từ'])->translatedFormat('d/m/Y');
                    }

                    if ($data['Đến'] ?? null) {
                        $indicators['Đến'] = 'đến ngày ' . Carbon::parse($data['Đến'])->translatedFormat('d/m/Y');
                    }

                    return $indicators;
                })
    ];
    }
}
