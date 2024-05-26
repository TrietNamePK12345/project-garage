<?php

namespace App\Filament\Admin\Resources\ProductResource;

use App\Filament\Admin\Resources\ProductResource\Forms\ProductForm;
use App\Filament\Admin\Resources\ProductResource\Tables\ProductTable;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $label = 'Sản phẩm';
    protected static ?string $navigationGroup = 'Dịch vụ';
    protected static ?string $slug = 'san-pham';
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';

    public static function form(Form $form): Form
    {
        return ProductForm::form($form);
    }

    public static function table(Table $table): Table
    {
        return ProductTable::table($table);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
