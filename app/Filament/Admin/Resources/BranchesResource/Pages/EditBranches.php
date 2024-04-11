<?php

namespace App\Filament\Admin\Resources\BranchesResource\Pages;

use App\Filament\Admin\Resources\BranchesResource\BranchesResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBranches extends EditRecord
{
    protected static string $resource = BranchesResource::class;


   protected function getSavedNotification(): ?Notification
   {
       return Notification::make()
           ->title('Đã cập nhật thành công')
           ->success()
           ->duration(3000)
           ->send();
   }

}
