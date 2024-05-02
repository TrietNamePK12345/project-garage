<?php

namespace App\Filament\Admin\Resources\CustomerResource\Tables;
use App\Filament\Admin\Resources\CustomerResource\Actions\CustomerAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CustomerTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Tên khách hàng')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable()
                    ->alignCenter(),

                ToggleColumn::make('status')
                    ->label('Trạng thái')
                    ->searchable()
                    ->alignCenter()
            ])
            ->actions(CustomerAction::actions())
            ->bulkActions(CustomerAction::bulkActions());
    }
}
