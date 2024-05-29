<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Widgets;

use App\Filament\Admin\Resources\EmployeeResource\Pages\ListEmployees;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class EmployeeWidget extends BaseWidget
{
    protected function getTablePage():array
    {
        return ListEmployees::class;
    }
    protected function getStats(): array
    {
        $employeeAll = User::where('role', 0)->count();
        $employeeActive = User::where('status', 1)->count();
        $employeeOff = User::where('status', 0)->count();
        return [
            Stat::make('Tổng nhân viên', $employeeAll)
                ->description('Tất cả nhân viên')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 50])
                ->color('success'),

            Stat::make('Nhân viên hoạt động', $employeeActive)
                ->description('Tổng nhân viên hoạt động')
                ->descriptionIcon('heroicon-m-bolt', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 50])
                ->color('warning'),

            Stat::make('Nhân viên không hoạt động', $employeeOff)
                ->description('Tổng nhân viên không hoạt động')
                ->descriptionIcon('heroicon-m-bolt-slash', IconPosition::Before)
                ->chart([1, 3, 5, 10, 20, 50])
                ->color('danger'),
        ];
    }
}
