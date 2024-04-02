<?php

namespace App\Filament\Admin\Resources\ProvincesResource\Actions;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
class ProvincesAction
{
    public static function actions(): array
    {
        return [
            ActionGroup::make([
                ViewAction::make()->label('Xem chi tiết'),
            ])

        ];
    }

    public static function bulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ];
    }
}
