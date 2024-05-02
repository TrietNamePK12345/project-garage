<?php

namespace App\Filament\Admin\Resources\CustomerResource\Actions;

use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class CustomerAction
{
    public static function actions(): array
    {
        return [
            ActionGroup::make([
                ViewAction::make()->label('Xem chi tiết'),
                EditAction::make()->label('Cập nhật'),
                DeleteAction::make('Xóa')
            ])
                ->size(ActionSize::Small)
                ->color('primary'),

        ];
    }

    public static function bulkActions(): array
    {
        return [
            BulkActionGroup::make([
            DeleteBulkAction::make()
            ]),
        ];
    }

}
