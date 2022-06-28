<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
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
                TextInput::make('name')->label('Name'),
            ]);
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Numéro'),
                TextColumn::make('created_at')
                    ->label('Date de commande')
                    ->dateTime('l j F Y'),
                TextColumn::make('shipping')
                    ->label('Livraison')
                    ->enum([
                        'shipping' => 'À domicile',
                        'collect' => 'À la brasserie',
                    ]),
                BooleanColumn::make('paid')
                    ->label('Payé'),
                BadgeColumn::make('status')
                    ->label('Statut')
                    ->enum([
                        'pending' => 'En attente',
                        'processing' => 'En cours',
                        'cancelled' => 'Annulé',
                        'finished' => 'Terminé',
                    ])
                    ->colors([
                        'warning' => 'processing',
                        'success' => 'finished',
                        'danger' => 'cancelled',
                    ]),
            ])
            ->actions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
