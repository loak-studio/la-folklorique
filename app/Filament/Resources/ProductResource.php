<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Gestion e-commerce';
    protected static ?string $label = "Produit";
    protected static ?string $pluralLabel = "Produits";
    protected static ?string $navigationLabel = 'Produits';
    protected static ?string $navigationIcon = 'heroicon-o-archive';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->label('Nom du produit :')
                        ->required()
                        ->autofocus(),
                    MarkdownEditor::make('description')
                        ->label('Description du produit :')
                        ->required(),
                    FileUpload::make('pictures')
                        ->label('Images du produit :')
                        ->multiple()
                        ->image()
                        ->required(),
                ])->columnSpan(2),
                Card::make()->schema([
                    BelongsToManyMultiSelect::make('category_id')->relationship('categories', 'name')
                        ->label('Catégories du produit :')
                        ->required()
                        ->options(Category::all()->mapWithKeys(function (Category $category) {
                            return [$category->id => $category->name];
                        })),
                    Toggle::make('available')
                        ->default(true)
                        ->label('Disponible'),
                    TextInput::make('price')
                        ->label('Prix du produit :')
                        ->suffix('€')
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator('.')
                                ->decimalSeparator(','),
                        )
                        ->required(),
                    TextInput::make('old_price')
                        ->label('Ancien prix du produit (prix barré) :')
                        ->suffix('€')
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator('.')
                                ->decimalSeparator(','),
                        )
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Prix')
                    ->money('eur')
                    ->sortable(),
                BooleanColumn::make('visible')
                    ->label('Visible')
                    ->sortable(),
                BooleanColumn::make('available')
                    ->label('Disponible')
                    ->sortable(),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
