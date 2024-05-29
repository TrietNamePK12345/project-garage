<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Tables;

use App\Filament\Admin\Resources\EmployeeResource\Actions\EmployeeAction;
use App\Models\User;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EmployeeTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->query(User::where('role',0))
            ->columns([
                TextColumn::make('name')
                ->label('Tên nhân viên')
                ->sortable()
                ->searchable()
                ->alignCenter(),

                ImageColumn::make('avatar')
                ->label('Ảnh')
                ->alignCenter()
                ->width(50)
                ->height(50)
                ->circular(),

                TextColumn::make('phone')
                ->label('Số điện thoại')
                ->searchable()
                ->sortable()
                ->alignCenter(),

                TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable()
                ->alignCenter(),

                TextColumn::make('branch.name')
                ->label('Chi nhánh')
                ->alignCenter()
                ->sortable()
                ->searchable(),

                ToggleColumn::make('status')
                ->label('Trạng thái')
                ->alignCenter()
                ->sortable()
                ->onIcon('heroicon-m-bolt')
                ->offIcon('heroicon-m-bolt-slash')
                ->onColor('success')
                ->offColor('danger')
            ])
            ->filters(EmployeeFilter::filters())
            ->actions(EmployeeAction::action())
            ->bulkActions(EmployeeAction::bulkActions());
    }
}
