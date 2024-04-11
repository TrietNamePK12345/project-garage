<?php

namespace App\Filament\Admin\Resources\BranchesResource\Tables;

use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
class BranchesTableFilters
{
    public static function filters(): array
    {
        return [
            Filter::make('Nổi bật')

        ];
    }
}
