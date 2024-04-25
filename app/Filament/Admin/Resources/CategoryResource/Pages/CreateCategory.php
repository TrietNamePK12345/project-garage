<?php

namespace App\Filament\Admin\Resources\CategoryResource\Pages;

use App\Filament\Admin\Resources\CategoryResource\CategoryResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected  function getRedirectUrl(): string
    {
        return CategoryResource::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Tạo loại dịch vụ thành công')
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
