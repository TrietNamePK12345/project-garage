<?php

namespace App\Filament\Admin\Resources\ProductResource;

use App\Filament\Admin\Resources\ProductResource\Actions\ProductInfolist;
use App\Filament\Admin\Resources\ProductResource\Forms\ProductForm;
use App\Filament\Admin\Resources\ProductResource\Pages\ViewProduct;
use App\Filament\Admin\Resources\ProductResource\Tables\ProductTable;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $label = 'Dịch vụ';
    protected static ?string $navigationGroup = 'Quản lí dịch vụ';
    protected static ?string $slug = 'dich-vu';
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';

    public static function form(Form $form): Form
    {
        return ProductForm::form($form);
    }

    public static function table(Table $table): Table
    {
        return ProductTable::table($table);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return ProductInfolist::infolist($infolist);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
