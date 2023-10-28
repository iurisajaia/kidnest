<?php

namespace App\Filament\Resources\KidAgeResource\Pages;

use App\Filament\Resources\KidAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKidAge extends EditRecord
{
    protected static string $resource = KidAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
