<?php

namespace App\Filament\Resources\DropdownItemResource\Pages;

use App\Filament\Resources\DropdownItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDropdownItem extends CreateRecord
{
    protected static string $resource = DropdownItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
