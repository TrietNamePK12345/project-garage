<?php

namespace App\Filament\Admin\Resources\BranchesResource\Pages;

use App\Filament\Admin\Resources\BranchesResource\BranchesResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\BranchesResource\Actions\BranchesAction;

class CreateBranches extends CreateRecord
{
    protected static string $resource = BranchesResource::class;

    protected function getRedirectUrl(): string
    {
        return BranchesResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Đã tạo thành công 1 chi nhánh mới')
            ->success()
            ->duration(3000)
            ->send();

    }

    protected function afterCreate():void
    {
        logger('Sau khi tạo');
        logger($this->record);
    }


}
