<?php

namespace App\Filament\Admin\Resources\CategoryResource\Tables;
use App\Filament\Admin\Resources\CategoryResource\Actions\CategoryAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
class CategoryTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                ->label('Ảnh')
                ->square()
                ->searchable()
                ->width(80)
                ->height(80)
                ->alignCenter(),

                TextColumn::make('category_name')
                ->label('Tên Loại')
                    ->searchable()
                ->alignCenter(),

                ToggleColumn::make('status')
                ->label('Trạng thái')
                    ->searchable()
                ->alignCenter()
            ])
            ->actions(CategoryAction::actions())
            ->bulkActions(CategoryAction::bulkActions());
    }
}
