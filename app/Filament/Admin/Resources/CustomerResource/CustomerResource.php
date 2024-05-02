<?php

namespace App\Filament\Admin\Resources\CustomerResource;

use App\Filament\Admin\Resources\CustomerResource\Forms\CustomerForm;
use App\Filament\Admin\Resources\CustomerResource\Tables\CustomerTable;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected static ?string $navigationGroup = 'Quản Lý Người Dùng';
    protected static ?string $label = 'Khách hàng';
    protected static ?string $slug = 'danh-sach-khach-hang';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
      return CustomerForm::form($form);
    }

    public static function table(Table $table): Table
    {
        return CustomerTable::table($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
//            'view' => Pages\ViewCustomer::route('/{record}'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
