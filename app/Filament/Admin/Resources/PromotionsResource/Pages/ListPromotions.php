<?php

namespace App\Filament\Admin\Resources\PromotionsResource\Pages;

use App\Filament\Admin\Resources\PromotionsResource\PromotionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromotions extends ListRecords
{
    protected static string $resource = PromotionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
