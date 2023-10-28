<?php

namespace App\Filament\Resources\KidAgeResource\Pages;

use App\Filament\Resources\KidAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKidAges extends ListRecords
{
    protected static string $resource = KidAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
