<?php

namespace App\Filament\Admin\Resources\PromotionsResource\Forms;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Str;
use Filament\Forms\Components\TagsInput;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Filament\Forms\Components\Group;


class PromotionForm
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Tiêu đề')
                            ->autofocus()
                            ->autocomplete('on')
                            ->type('text')
                            ->required()
                            ->columnSpan('full'),
                        RichEditor::make('description')
                            ->label('Mô tả')
                            ->toolbarButtons([
                                'attachFiles', 'blockquote', 'bold', 'bulletList',
                                'codeBlock', 'h2', 'h3', 'italic', 'link',
                                'orderedList', 'redo', 'strike', 'underline', 'undo',
                            ])
                            ->required()
                            ->columnSpan('full'),
                    ]),
                Card::make()
                    ->schema([
                        Select::make('type')
                            ->label('Hình thức giảm giá')
                            ->options([
                                'by_code' => 'Theo mã',
                                'by_product' => 'Theo sản phẩm',
                                'by_ordAer' => 'Theo hóa đơn',
                                'by_customer' => 'Theo khách hàng',
                            ])
                            ->required()
                            ->reactive()
                            ->columnSpan('full'),
                        TextInput::make('code')
                            ->label('Mã giảm giá')
                            ->visible(fn ($get) => $get('type') === 'by_code')
                            ->required(fn ($get) => $get('type') === 'by_code')
                            ->afterStateUpdated(function (callable $set) {
                                $set('code', Str::random(8));
                            }),
                        TextInput::make('num_uses')
                            ->label('Số lần sử dụng giảm giá')
                            ->visible(fn ($get) => $get('type') === 'by_code')
                            ->required(fn ($get) => $get('type') === 'by_code')
                        ,
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('Random mã')
                                ->action(function (callable $set) {
                                    $set('code', Str::random(18));
                                })
                                ->visible(fn ($get) => $get('type') === 'by_code'),
                        ]),
                        Select::make('discount_product')
                            ->label('Đối tượng sản phẩm')
                            ->options([
                                'by_all' => 'Tất cả sản phẩm',
                                'by_object' => 'Các sản phẩm cụ thể',
                                'by_category' => 'Danh mục sản phẩm',
                            ])
                            ->visible(fn ($get) => $get('type') === 'by_product')
                            ->required()
                            ->reactive()
                            ->columnSpan('full'),
                        TagsInput::make('specific_products')
                            ->label('Các sản phẩm cụ thể')
                            ->placeholder('Nhập tên sản phẩm')
                            ->visible(fn ($get) => $get('type') === 'by_product' && $get('discount_product') === 'by_object')
                            ->suggestions(function () {
                                $products = ProductController::allProducts();
                                return $products->pluck('name', 'id');
                            }),
                        TagsInput::make('product_categories')
                            ->label('Danh mục sản phẩm')
                            ->placeholder('Chọn danh mục sản phẩm')
                            ->visible(fn ($get) => $get('type') === 'by_product' && $get('discount_product') === 'by_category')
                            ->suggestions(function () {
                                $category = CategoryController::index();
                                return $category->pluck('name', 'id');
                            })
                            ->columnSpan('full'),
                        Group::make()
                            ->schema([
                                Select::make('order_discount_type')
                                    ->visible(fn ($get) => $get('type') === 'by_order')
                                    ->label('Loại giảm giá')
                                    ->options([
                                        'by_cart' => 'Giảm theo giỏ hàng',
                                        'by_order' => 'Giảm theo tổng đơn hàng',
                                    ])
                                    ->required()
                                    ->columnSpan(2),
                            ])
                            ->label('Loại giảm giá'),
                        Group::make([
                            Select::make('order_discount_condition')
                                ->label('Điều kiện giảm giá theo đơn hàng')
                                ->visible(fn ($get) => $get('tye') === 'by_order' && $get('order_discount_type') === 'by_cart')
                                ->options([
                                    'greater_than_or_equal' => 'Lớn hơn hoặc bằng',
                                    'less_than_or_equal' => 'Nhỏ hơn hoặc bằng',
                                    'greater_than' => 'Lớn hơn',
                                    'less_than' => 'Nhỏ hơn',
                                ])
                                ->reactive()
                                ->columnSpan(1),
                            TextInput::make('order_discount_value')
                                ->label('Giá trị đơn hàng')
                                ->visible(fn ($get) => $get('type') === 'by_order' && $get('order_discount_type') === 'by_cart')
                                ->required(fn ($get) => $get('order_discount_condition') !== null)
                                ->type('number')
                                ->columnSpan(1),
                        ])->label('Điều kiện')->columns(2),
                    ]),
                Card::make()
                    ->schema([
                        Group::make()
                            ->schema([
                                Select::make('discount_type')
                                    ->label('Loại giảm giá')
                                    ->options([
                                        'by_percent' => 'Theo phần trăm chiết khấu',
                                        'by_price' => 'Theo giá cụ thể',
                                    ])
                                    ->default('by_price') // Mặc định là "Theo giá cụ thể"
                                    ->required()
                                    ->reactive()
                                    ->columnSpan(1),
                                Group::make()
                                    ->schema([
                                        TextInput::make('discount_percent')
                                            ->label('Phần trăm chiết khấu')
                                            ->visible(fn ($get) => $get('discount_type') === 'by_percent')
                                            ->required(fn ($get) => $get('discount_type') === 'by_percent')
                                            ->type('number'),
                                        TextInput::make('discount_price')
                                            ->label('Giá giảm')
                                            ->visible(fn ($get) => $get('discount_type') === 'by_price')
                                            ->required(fn ($get) => $get('discount_type') === 'by_price')
                                            ->type('number')
                                    ])
                                    ->label('Hình thức giảm giá')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),
                    ]),
                Card::make()
                    ->schema([
                        DatePicker::make('start_date')
                            ->label('Ngày bắt đầu')
                            ->required()
                            ->columnSpan(1),
                        DatePicker::make('end_date')
                            ->label('Ngày kết thúc')
                            ->required()
                            ->columnSpan(1),
                    ])
                    ->columns(2),
                Toggle::make('status')
                    ->label('Trạng thái')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success'),
            ]);
    }
}
