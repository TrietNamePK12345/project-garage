<?php

namespace App\Filament\Admin\Resources\ProvincesResource\Tables;
use Filament\Tables\Filters\Filter;
class ProvincesFilters
{
    public static function filters(): array
    {
        return [
            Filter::make('Nổi bật')

        ];
    }
}
