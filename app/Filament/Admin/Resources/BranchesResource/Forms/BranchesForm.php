<?php

namespace App\Filament\Admin\Resources\BranchesResource\Forms;

use App\Models\Provinces;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;

class BranchesForm
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Thông tin chi nhánh')
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên chi nhánh')
                            ->placeholder('Nhập tên chi nhánh')
                            ->rules('required|min:10|max:255')
                            ->unique(ignoreRecord: true),


                        TextInput::make('address')
                            ->label('Địa chỉ')
                            ->placeholder('Nhập địa chỉ chi nhánh')
                            ->rules('required|min:10|max:255')
                            ->unique(ignoreRecord: true),


                        TextInput::make('phone_number')
                            ->label('Liên lạc')
                            ->placeholder('Nhập số điện thoại')
                            ->rule('required')
                            ->unique(ignoreRecord: true)
                            ->regex('/^0\d{10}$/')


                    ])->columnSpan(2)->columns(1),

                Group::make()->schema([
                    Section::make("Khu vực chi nhánh")
                        ->schema([

                            Select::make('province_id')
                                ->label('Chọn khu vực')
                                ->options(Provinces::all()->pluck('name', 'id'))
                                ->searchable()
                                ->rule('required')

                        ]),

                    Section::make("Trạng thái hoạt động")
                        ->schema([
                            Select::make('status')
                                ->label('Chọn trạng thái')
                                ->rule('required')
                                ->options([
                                    1 => 'Hoạt động',
                                    0 => 'Dừng hoạt động'
                                ])
                        ])
                ]),

            ])->columns(['md' => 2, 'xl' => 3]);
    }
}
