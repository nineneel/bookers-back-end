<?php

namespace App\Filament\Resources\GenreResource\Pages;

use App\Filament\Resources\GenreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGenres extends ListRecords
{
    protected static string $resource = GenreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
