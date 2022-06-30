<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Resources\QuestionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestions extends ListRecords
{
    protected static string $resource = QuestionResource::class;

    protected function getTitle(): string
    {
        return 'Toutes les questions';
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer une question'),
        ];
    }
}
