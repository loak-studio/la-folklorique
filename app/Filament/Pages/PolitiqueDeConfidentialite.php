<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;

class PolitiqueDeConfidentialite extends Page
{
    use InteractsWithForms;
    protected static string $view = 'filament.pages.politique-de-confidentialite';
    protected static ?string $title = "Modifier la politique de confidentialité";
    protected static ?string $navigationGroup = 'Gestion site internet';
    protected static ?string $navigationLabel = ' Politique de confidentialité';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public $data;
    protected function getFormSchema(): array
    {
        return [
            Card::make()->schema([
                MarkdownEditor::make('content')
                    ->label('Politique de confidentialité :')
                    ->required(),
            ])
        ];
    }

    public function mount()
    {
        $this->data = Content::where('key', 'politique-de-confidentialite')->first();
        $this->form->fill([
            'content' => $this->data->value
        ]);
    }

    public function submit(): void
    {
        $cgv = Content::where('key', 'politique-de-confidentialite')->first();
        $cgv->value = $this->form->getState()['content'];
        $cgv->save();
        $this->notify('success', 'Enregistré');
    }
}
