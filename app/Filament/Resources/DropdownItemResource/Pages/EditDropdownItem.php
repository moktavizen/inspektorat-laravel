<?php

namespace App\Filament\Resources\DropdownItemResource\Pages;

use App\Filament\Resources\DropdownItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDropdownItem extends EditRecord
{
    protected static string $resource = DropdownItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
