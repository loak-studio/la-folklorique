<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;
    protected static ?string $recordTitleAttribute = 'code';
    protected static ?string $navigationGroup = 'Gestion e-commerce';
    protected static ?string $label = "Code promo";
    protected static ?string $pluralLabel = "Codes promos";
    protected static ?string $navigationLabel = 'Codes promos';
    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('code')
                        ->label('Code promo :')
                        ->required(),
                    Toggle::make('free_shipping')
                        ->label('Livraison gratuite')
                        ->default(false)
                        ->reactive(),
                    TextInput::make('value')
                        ->label('Valeur en € :')
                        ->suffix('€')
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator('.')
                                ->decimalSeparator(','),
                        )
                        ->hidden(fn (Closure $get) => $get('free_shipping'))
                        ->required(fn (Closure $get) => !$get('free_shipping')),
                    TextInput::make('quantity')
                        ->label('Nombre d\'utilisations :')
                        ->mask(
                            fn (Mask $mask) => $mask
                                ->numeric()
                                ->integer()
                                ->minValue(0)
                        )
                        ->required(),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Code promo')
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Nombre d\'utilisations restantes')
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Valeur en €')
                    ->money('eur')
                    ->sortable(),
                BooleanColumn::make('free_shipping')
                    ->label('Livraison gratuite')
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
