<?php

namespace App\Filament\Resources\DropdownItemResource\Pages;

use App\Filament\Resources\DropdownItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDropdownItems extends ListRecords
{
    protected static string $resource = DropdownItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
