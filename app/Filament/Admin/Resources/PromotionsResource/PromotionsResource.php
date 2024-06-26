<?php

namespace App\Filament\Admin\Resources\PromotionsResource;

use App\Filament\Admin\Resources\PromotionsResource\Forms\PromotionForm;
use App\Filament\Admin\Resources\PromotionsResource\Tables\PromotionTable;
use App\Models\Promotion;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PromotionsResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return PromotionForm::form($form);
    }

    public static function table(Table $table): Table
    {
      return PromotionTable::Table($table);
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotions::route('/create'),
            'edit' => Pages\EditPromotions::route('/{record}/edit'),
        ];
    }
}
