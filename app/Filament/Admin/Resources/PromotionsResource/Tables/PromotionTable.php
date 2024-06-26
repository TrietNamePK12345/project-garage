<?php

namespace App\Filament\Admin\Resources\PromotionsResource\Tables;

use Filament\Tables\Table;


class PromotionTable
{
 public static function Table($table): Table
 {
     return $table
         ->columns([
             //
         ]);

//         ->actions([
//             Tables\Actions\EditAction::make(),
//         ])
//         ->bulkActions([
//             Tables\Actions\BulkActionGroup::make([
//                 Tables\Actions\DeleteBulkAction::make(),
//             ]),
//         ]);
 }
}
