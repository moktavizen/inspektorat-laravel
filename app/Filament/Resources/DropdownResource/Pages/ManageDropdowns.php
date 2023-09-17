<?php

namespace App\Filament\Resources\DropdownResource\Pages;

use App\Filament\Resources\DropdownResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDropdowns extends ManageRecords
{
    protected static string $resource = DropdownResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
