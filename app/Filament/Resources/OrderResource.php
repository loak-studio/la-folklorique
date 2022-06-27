<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationGroup = 'Gestion e-commerce';
    protected static ?string $label = "Commande";
    protected static ?string $pluralLabel = "Commandes";
    protected static ?string $navigationLabel = 'Commandes';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-in';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('first_name')
                        ->label('Prénom :'),
                    TextInput::make('last_name')
                        ->label('Nom :'),
                    TextInput::make('address')
                        ->label('Adresse :')
                        ->columnSpan(2),
                    TextInput::make('email')
                        ->label('Adresse email :')
                        ->columnSpan(2),
                    TextInput::make('phone')
                        ->label('Numéro de téléphone :')
                        ->columnSpan(2),
                    Textarea::make('notes')
                        ->label('Notes :')
                        ->columnSpan(2)
                ])->columnSpan(2)->columns(2),
                Card::make()->schema([
                    TextInput::make('price')
                        ->label('Prix total :')
                        ->suffix('€')
                        ->mask(
                            fn (Mask $mask) => $mask
                                ->numeric()
                                ->decimalPlaces(2)
                                ->decimalSeparator(',')
                                ->minValue(0)
                                ->padFractionalZeros()
                                ->thousandsSeparator('.'),
                        ),
                    Select::make('coupon_id')
                        ->label('Code promo utilisé :')
                        ->options(Coupon::all()->pluck('code', 'id'))
                        ->searchable(),
                    Toggle::make('has_been_send')
                        ->label('Commande envoyée'),
                    Select::make('payment')
                        ->label('Moyen de paiement :')
                        ->options([
                            'stripe' => 'Stripe',
                            'paypal' => 'Paypal',
                            'cash' => 'En espèces à la livraison',
                            'collect' => 'En espèces à la brasserie',
                        ])
                ])->columnSpan(1),
                Card::make()->schema([
                    HasManyRepeater::make('items')
                        ->relationship('items')
                        ->schema([
                            Select::make('product_id')
                                ->label('Produit :')
                                ->options(Product::all()->pluck('name', 'id'))
                                ->searchable(),
                            TextInput::make('price')
                                ->label('Prix :')
                                ->mask(
                                    fn (Mask $mask) => $mask
                                        ->numeric()
                                        ->decimalPlaces(2)
                                        ->decimalSeparator(',')
                                        ->minValue(0)
                                        ->padFractionalZeros()
                                        ->thousandsSeparator('.'),
                                )
                                ->suffix('€'),
                            TextInput::make('quantity')
                                ->label('Quantité :')
                                ->mask(
                                    fn (Mask $mask) => $mask
                                        ->numeric()
                                        ->minValue(0)
                                )
                        ])->columns(3)
                        ->label('Panier')
                ])->columnSpan(2)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Numéro de commande')
                    ->sortable(),
                TextColumn::make('first_name')
                    ->label('Prénom')
                    ->sortable(),
                TextColumn::make('last_name')
                    ->label('Nom')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Total')
                    ->suffix('€')
                    ->sortable(),
                BooleanColumn::make('has_been_send')
                    ->label('Commande envoyée')
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
            'index' => Pages\ListOrders::route('/'),
            'show' => Pages\ViewOrder::route('/{record}'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
