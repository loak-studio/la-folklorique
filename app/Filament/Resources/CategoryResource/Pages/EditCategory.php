<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getTitle(): string
    {
        return 'Modifier la catégorie : ' . $this->record->name;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Supprimer la catégorie'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
