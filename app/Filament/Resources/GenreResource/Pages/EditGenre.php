<?php

namespace App\Filament\Resources\GenreResource\Pages;

use App\Filament\Resources\GenreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGenre extends EditRecord
{
    protected static string $resource = GenreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
