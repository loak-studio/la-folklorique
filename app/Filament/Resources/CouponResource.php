<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Gestion e-commerce';
    protected static ?string $label = "Code promo";
    protected static ?string $pluralLabel = "Codes promos";
    protected static ?string $navigationLabel = 'Codes promos';
    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->label('Nom du code promo :')
                        ->required(),
                    TextInput::make('code')
                        ->label('Code promo :')
                        ->required(),
                    Toggle::make('free_shipping')
                        ->label('Livraison gratuite')
                        ->default(false)
                        ->reactive(),
                    Toggle::make('is_in_euros')
                        ->label('La valeur de ce code est en euros')
                        ->default(false)
                        ->hidden(fn (Closure $get) => $get('free_shipping'))
                        ->reactive(),
                    TextInput::make('value')
                        ->label(fn (Closure $get) => $get('is_in_euros') ? 'Valeur en € :' : 'Valeur en % :')
                        ->suffix(fn (Closure $get) => $get('is_in_euros') ? '€' : '%')
                        ->mask(
                            fn (Mask $mask) => $mask
                                ->numeric()
                                ->decimalPlaces(2)
                                ->decimalSeparator(',')
                                ->minValue(0)
                                ->padFractionalZeros()
                        )
                        ->hidden(fn (Closure $get) => $get('free_shipping'))
                        ->required(fn (Closure $get) => !$get('free_shipping')),
                ])->columnSpan(2),
                Card::make()->schema([
                    Toggle::make('is_unlimited')
                        ->label('Nombre d\'utilisations illimitée')
                        ->default(false)
                        ->reactive(),
                    TextInput::make('quantity')
                        ->label('Nombre d\'utilisations :')
                        ->mask(
                            fn (Mask $mask) => $mask
                                ->numeric()
                                ->integer()
                                ->minValue(0)
                        )
                        ->hidden(fn (Closure $get) => $get('is_unlimited')),
                    DateTimePicker::make('expiration_date')
                        ->label('Date d\'expiration :')
                        ->default(now())
                        ->required()
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom du code promo')
                    ->sortable(),
                TextColumn::make('code')
                    ->label('Code promo')
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Nombre d\'utilisations restantes')
                    ->sortable(),
                TextColumn::make('expiration_date')
                    ->label('Date d\'expiration')
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
