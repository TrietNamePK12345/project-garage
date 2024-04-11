<?php

namespace App\Filament\Admin\Resources\ProvincesResource\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use App\Models\Branches;
use Filament\Forms\Components\Select;
class ProvincesForm
{
    public static function form(Form $form): Form
    {
        $branches = Branches::all()->pluck('name', 'id');

        return $form
            ->schema([
                TextInput::make('id')
                    ->label('Mã tỉnh'),

                TextInput::make('name')
                    ->label('Tên tỉnh'),

                Select::make('name')
                    ->label('Chi nhánh')
                    ->options($branches)
                    ->required(),

            ]);

    }
}
