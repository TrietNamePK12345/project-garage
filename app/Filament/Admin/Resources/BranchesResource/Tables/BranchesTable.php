<?php

namespace App\Filament\Admin\Resources\BranchesResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Support\Enums\Alignment;
use App\Filament\Admin\Resources\BranchesResource\Actions\BranchesAction;

class BranchesTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Mã chi nhánh')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('name')
                    ->label('Chi nhánh')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('phone_number')
                    ->label('Liên lạc')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('province.name')
                    ->label('Khu vực')
                    ->searchable(),

                ToggleColumn::make('status')
                    ->label('Trạng thái')
                    ->alignCenter()

            ])
            ->defaultPaginationPageOption(25)
            //__________________________________________
            ->actions(BranchesAction::actions())
            ->bulkActions(BranchesAction::bulkActions());
    }

}
