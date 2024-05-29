<?php

namespace App\Filament\Admin\Resources\EmployeeResource;

use App\Filament\Admin\Resources\EmployeeResource\Actions\EmployeeInfolist;
use App\Filament\Admin\Resources\EmployeeResource\Forms\EmployeeForm;
use App\Filament\Admin\Resources\EmployeeResource\Tables\EmployeeTable;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;


class EmployeeResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $label = 'Nhân viên';
    protected static ?string $navigationGroup = 'Quản lý người dùng';
    protected static ?string $slug = 'nhan-vien';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return EmployeeForm::form($form);
    }

    public static function table(Table $table): Table
    {
        return EmployeeTable::table($table);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
      return EmployeeInfolist::infolist($infolist);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
