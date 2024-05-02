<?php

namespace App\Filament\Admin\Resources\CustomerResource\Pages;

use App\Filament\Admin\Resources\CustomerResource\CustomerResource;
use App\Filament\Admin\Resources\CustomerResource\Forms\CustomerForm;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return CustomerResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Khách hàng mới đã được tạo thành công!')
            ->success()
            ->duration(3000)
            ->send();

    }
}
