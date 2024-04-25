<?php

namespace App\Filament\Admin\Resources\CategoryResource\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
class CategoryForm
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Grid::make()
                    ->schema([
                        TextInput::make('category_name')
                        ->label('Tên Loại')
                        ->placeholder("Nhập tên loại...")
                        ->rule('required')
                        ->unique(ignoreRecord: true),

                       Select::make('status')
                        ->label('Chọn trạng thái')
                        ->rule('required')
                        ->options([
                            1 => 'Hoạt động',
                            0 => 'Không hoạt động'
                        ])
                    ]),
                    FileUpload::make('image_url')
                        ->label('Ảnh loại')
                        ->rule('required')
                    ->image()
                    ->directory('categories')
                ])
            ]);
    }
}
