<?php

namespace App\Filament\Admin\Resources\PromotionsResource\Pages;

use App\Filament\Admin\Resources\PromotionsResource\PromotionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotions extends EditRecord
{
    protected static string $resource = PromotionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


}
