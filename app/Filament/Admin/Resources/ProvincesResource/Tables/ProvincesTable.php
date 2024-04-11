<?php

namespace App\Filament\Admin\Resources\ProvincesResource\Tables;

use App\Filament\Admin\Resources\BranchesResource\Actions\BranchesAction;
use App\Filament\Admin\Resources\BranchesResource\Tables\BranchesTableFilters;
use App\Filament\Admin\Resources\ProvincesResource\Actions\ProvincesAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Branches;
use App\Models\Provinces;
use Filament\Tables\Filters\Filter;


class ProvincesTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('Mã Tỉnh')
                    ->alignCenter(),

                TextColumn::make('name')
                    ->label('Tên Tỉnh')
                    ->searchable()
                    ->alignCenter(),

                TextColumn::make('branch_count')
                    ->alignCenter()
                    ->label('Chi Nhánh')
            ])

            ->query(
                Provinces::query()
                    ->select('provinces.*')
                    ->selectSub(
                        Branches::query()
                            ->selectRaw('COUNT(*)')
                            ->whereColumn('branches.province_id', 'provinces.id'),
                        'branch_count'
                )->having('branch_count', '>', 0)
            )
            ->defaultPaginationPageOption(25);

    }


}

