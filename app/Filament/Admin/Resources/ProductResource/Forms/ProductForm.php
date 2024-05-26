<?php

namespace App\Filament\Admin\Resources\ProductResource\Forms;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Support\RawJs;
use Filament\Forms\Components\DatePicker;

class ProductForm
{
    public static function form(Form $form): Form
    {
        return  $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('name')
                        ->label('Tên dịch vụ')
                        ->placeholder('Tên dịch vụ')
                        ->rules('required|max:200|min:5')
                        ->unique()
                    ]),

                    Section::make()->schema([
                        MarkdownEditor::make('description')
                        ->label('Mô tả dịch vụ')
                        ->rules('required')
                    ]),

                     Section::make()->schema([
                         FileUpload::make('image_url')
                             ->label('Hình ảnh sản phẩm')
                             ->rules('required')
                             ->placeholder('Chọn hình ảnh')
                             ->image()
                             ->directory('products')
                     ])
                ])->columnSpan(8),


                Group::make()->schema([

                    Section::make()->schema([
                        Select::make('category_id')
                        ->label('Loại dịch vụ')
                        ->rule('required')
                        ->relationship('category','category_name')
                        ->searchable()
                        ->preload()
                    ]),

                    Section::make()->schema([
                        TextInput::make('price')
                        ->label('Giá dịch vụ')
                        ->numeric()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->rules('required|min:5000')
                        ->prefix('VNĐ')
                    ]),

                    Section::make()->schema([
                        Toggle::make('status')
                        ->label('Trạng thái dịch vụ')
                        ->onIcon('heroicon-m-bolt')
                        ->offIcon('heroicon-m-bolt-slash')
                        ->onColor('success')
                        ->offColor('danger')
                        ->default('1')
                    ]),

                    Section::make()->schema([
                        DatePicker::make('created_at')
                        ->label('Ngày tạo')
                        ->disabled()
                        ->default(now())
                    ])
                ])->columnSpan(4)



            ])->columns(12);

    }
}
