<?php

namespace App\Filament\Admin\Resources\ProductResource\Actions;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;

class ProductInfolist
{
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Group::make()->schema([
                    Section::make('Hình ảnh sản phẩm')->schema([
                        ImageEntry::make('image_url')
                            ->label('')
                            ->radius(10)
                            ->size(215)
                            ->alignCenter()
                    ]),
                ])->columnSpan(4),

                Group::make()->schema([
                    Section::make('Thông tin sản phẩm')->schema([
                        TextEntry::make('name')
                            ->label('Tên sản phẩm:')
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        TextEntry::make('price')
                            ->label('Giá sản phẩm:')
                            ->numeric(decimalPlaces: 0)
                            ->weight(FontWeight::Bold)
                            ->suffix(' đ')
                            ->columnSpan(6),

                        TextEntry::make('category.category_name')
                            ->label('Loại dịch vụ:')
                            ->weight(FontWeight::Bold)
                            ->columnSpan(6),

                        TextEntry::make('created_at')
                            ->label('Ngày xuất bản')
                            ->dateTime()
                            ->weight(FontWeight::Bold)
                            ->columnSpan(6),

                        TextEntry::make('status')
                            ->label('Trạng thái:')
                            ->weight(FontWeight::Bold)
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                '1' => 'success',
                                '0' => 'danger',
                            })
                            ->formatStateUsing(fn(string $state): string => $state === '1' ? 'Hoạt động' : 'Không hoạt động')
                            ->columnSpan(6),
                    ])->columns(12)
                ])->columnSpan(8),

                Group::make()->schema([
                    Section::make('Mô tả sản phẩm')->schema([
                        TextEntry::make('description')
                            ->label('')
                            ->html()
                            ->columnSpanFull()
                    ])->columns(12)
                ])->columnSpanFull()
            ])->columns(12);
    }
}
