<?php

namespace App\Filament\Admin\Resources\ProvincesResource;


use App\Filament\Admin\Resources\BranchesResource\BranchesResource;
use App\Models\Branches;
use App\Models\Provinces;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Admin\Resources\ProvincesResource\Tables\ProvincesTable;
use App\Filament\Admin\Resources\ProvincesResource\Forms\ProvincesForm;

class ProvincesResource extends Resource
{
    protected static ?string $model = Provinces::class;
    protected static ?string $label = 'Khu vực';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý khu vực';

    public static function table(Table $table): Table
    {
        return ProvincesTable::table($table);
    }

    public static function form(Form $form): Form
    {
        return ProvincesForm::form($form);
    }
    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinces::route('/'),
        ];
    }
}
