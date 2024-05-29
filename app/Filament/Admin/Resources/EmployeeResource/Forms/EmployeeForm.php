<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Forms;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Hash;

class EmployeeForm
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    FileUpload::make('avatar')
                    ->label('')
                    ->rule('required')
                    ->image()
                    ->imageEditor()
                    ->avatar()
                    ->directory('avatars')
                    ->placeholder('Chọn hình ảnh')
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Thông tin nhân viên')->schema([
                        TextInput::make('name')
                        ->label('Họ và tên')
                        ->rules('required|max:100|min:3')
                        ->placeholder('Nhập họ và tên nhân viên....')
                        ->unique(ignoreRecord: true)
                        ->columnSpanFull(),

                        TextInput::make('phone')
                        ->label('Số điện thoại')
                        ->placeholder('Nhập số điện thoại...')
                        ->rules('required')
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                        ->tel()
                        ->unique(ignoreRecord: true)
                        ->columnSpan(6),

                        Select::make('branch_id')
                        ->label('Chọn chi nhánh')
                        ->rule('required')
                        ->relationship('branch', 'name')
                        ->preload()
                        ->searchable()
                        ->columnSpan(6),

                    ])->columns(12),
                    Section::make()->schema([
                        Toggle::make('status')
                            ->label('Trạng thái hoạt động')
                            ->default(1)
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-bolt-slash')
                            ->onColor('success')
                            ->offColor('danger')
                    ]),
                ])->columnSpan(6),
                Group::make()->schema([

                    Section::make('Tài khoản nhân viên')->schema([

                        TextInput::make('email')
                        ->label('Email')
                        ->placeholder('Nhập email...')
                        ->rules('required|email')
                        ->unique(ignoreRecord: true),

                       TextInput::make('password')
                        ->label('Mật khẩu')
                        ->password()
                        ->revealable()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->visibleOn('create')
                        ->rule('required')
                        ->placeholder('Nhập mật khẩu...'),

                        TextInput::make('password')
                        ->label('Nhập mật khẩu mới')
                        ->visibleOn('edit')
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->password()
                        ->revealable()
                        ->placeholder('Nhập mật khẩu mới...')
                        ->rule('required'),

                    ]),
                ])->columnSpan(4),

            ])->columns(12);
    }
}
