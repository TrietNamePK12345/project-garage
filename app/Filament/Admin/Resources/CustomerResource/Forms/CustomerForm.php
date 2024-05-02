<?php

namespace App\Filament\Admin\Resources\CustomerResource\Forms;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class CustomerForm
{
     public static function form(Form $form): Form
     {
         return $form
             ->schema([
                Group::make()->schema([
                    Section::make('Thông Tin Khách Hàng')->schema([
                        TextInput::make('name')
                        ->label('Tên khách hàng')
                        ->rules('required|min:3|max:50')
                        ->unique(ignoreRecord: true)
                        ->placeholder('Nhập tên khách hàng...'),

                        TextInput::make('email')
                        ->label('Email')
                        ->placeholder('john@gmail.com')
                        ->rules('required|email')
                        ->unique(ignoreRecord: true),

                        TextInput::make('phone')
                        ->label('Số điện thoại')
                        ->placeholder('0123456789')
                        ->regex('/^0\d{9}$/')
                        ->rules('required')
                        ->unique(ignoreRecord: true),

                        TextInput::make('address')
                        ->label('Địa chỉ')
                        ->placeholder('đường Nguyễn Văn Cừ, An Khánh, Cần Thơ...')
                        ->unique(ignoreRecord: true)
                        ->rules('required|min:10|max:255')
                        ->columnSpan(2),

                        Select::make('status')
                        ->label('Trạng thái hoạt động')
                        ->options([
                            0 => 'Dừng hoạt động',
                            1 => 'Hoạt động'
                        ])
                        ->default(1)
                        ->rule('required')
                        ->columns(2)

                    ])->columns(3)

                ])->columnSpanFull()
             ]);
     }
}
