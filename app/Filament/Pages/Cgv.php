<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Forms\Components\Card;
use Filament\Pages\Page;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class Cgv extends Page
{
    use InteractsWithForms;
    protected static string $view = 'filament.pages.cgv';
    protected static ?string $title = "Conditions générales de vente";
    protected static ?string $navigationGroup = 'Gestion site internet';
    protected static ?string $navigationLabel = 'Conditions générales de vente';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public $data;
    protected function getFormSchema(): array
    {
        return [
            Card::make()->schema([
                MarkdownEditor::make('content')
                    ->label('Conditions générales de vente :')
                    ->required(),
            ])
        ];
    }

    public function mount()
    {
        $this->data = Content::where('key', 'cgv')->first();
        $this->form->fill([
            'content' => $this->data->value
        ]);
    }

    public function submit(): void
    {
        $cgv = Content::where('key', 'cgv')->first();
        $cgv->value = $this->form->getState()['content'];
        $cgv->save();
        $this->notify('success', 'Enregistré');
    }
}
