<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Forms\Components\Card;
use Filament\Pages\Page;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class Banner extends Page
{
    use InteractsWithForms;
    protected static string $view = 'filament.pages.cgv';
    protected static ?string $title = "Bannière";
    protected static ?string $navigationGroup = 'Gestion site internet';
    protected static ?string $navigationLabel = 'Bannière';
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
        $this->data = Content::where('key', 'banner')->first();
        $this->form->fill([
            'content' => $this->data->value
        ]);
    }

    public function submit(): void
    {
        $Banner = Content::where('key', 'banner')->first();
        $Banner->value = $this->form->getState()['content'];
        $Banner->save();
        $this->notify('success', 'Enregistré');
    }
}
