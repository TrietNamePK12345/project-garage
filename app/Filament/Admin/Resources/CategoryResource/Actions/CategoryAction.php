<?php

namespace App\Filament\Admin\Resources\CategoryResource\Actions;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;

class CategoryAction
{
    public static function actions(): array
    {
        return [
          ActionGroup::make([
              ViewAction::make()->label('Xem chi tiết'),
              EditAction::make()->label('Cập nhật'),
              DeleteAction::make()->label('Xóa')
          ])
          ->size(ActionSize::Small)
          ->color('primary'),
        ];
    }

    public static function bulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
            ]),
        ];
    }
}
