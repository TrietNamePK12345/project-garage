<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Actions;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Support\Enums\FontWeight;

class EmployeeInfolist
{
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Group::make()->schema([
                    ImageEntry::make('avatar')
                        ->label('')
                        ->circular()
                        ->width(200)
                        ->height(200)
                ])->columnSpan(4),


                Group::make()->schema([
                    TextEntry::make('name')
                        ->label('Tên nhân viên:')
                        ->weight(FontWeight::Bold),
                    TextEntry::make('email')
                        ->label('Email:')
                        ->weight(FontWeight::Bold),
                    TextEntry::make('phone')
                        ->label('Số điện thoại:')
                        ->weight(FontWeight::Bold),
                ])->columnSpan(4),

                Group::make()->schema([
                    TextEntry::make('status')
                        ->label('Trạng thái:')
                        ->weight(FontWeight::Bold)
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            '1' => 'success',
                            '0' => 'danger',
                        })
                        ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Hoạt động' : 'Không hoạt động'),
                    TextEntry::make('branch.name')
                        ->label('Hoạt động ở chi nhánh:')
                        ->weight(FontWeight::Bold),
                ])->columnSpan(4)

            ])->columns(12);
    }
}
