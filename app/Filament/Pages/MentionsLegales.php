<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;

class MentionsLegales extends Page
{
    use InteractsWithForms;
    protected static string $view = 'filament.pages.mentions-legales';
    protected static ?string $title = "Mentions légales";
    protected static ?string $navigationGroup = 'Gestion site internet';
    protected static ?string $navigationLabel = 'Mentions légales';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public $data;
    protected function getFormSchema(): array
    {
        return [
            Card::make()->schema([
                MarkdownEditor::make('content')
                    ->label('Mentions légales :')
                    ->required(),
            ])
        ];
    }

    public function mount()
    {

        $this->data = Content::where('key', 'mentions-legales')->first();
        $this->form->fill([
            'content' => $this->data->value
        ]);
    }

    public function submit(): void
    {
        $cgv = Content::where('key', 'mentions-legales')->first();
        $cgv->value = $this->form->getState()['content'];
        $cgv->save();
        $this->notify('success', 'Enregistré');
    }
}
