<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointOfSellResource\Pages;
use App\Filament\Resources\PointOfSellResource\RelationManagers;
use App\Models\PointOfSell;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class PointOfSellResource extends Resource
{
    protected static ?string $model = PointOfSell::class;
    protected static ?string $navigationGroup = 'Gestion site internet';
    protected static ?string $label = "Point de vente";
    protected static ?string $pluralLabel = "Points de vente";
    protected static ?string $navigationLabel = 'Points de vente';
    protected static ?string $navigationIcon = 'heroicon-o-globe';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->label('Nom')->required(),
                    TextInput::make('street')->label('Rue')->required(),
                    TextInput::make('city')->label('Ville')->required(),
                ])->columnSpan(2),
                Section::make('Coordonnées GPS')
                    ->description('A laisser vide à la création, les données sont récupérées automatiquement.')
                    ->schema([
                        TextInput::make('latitude')->label('Latitude'),
                        TextInput::make('longitude')->label('Longitude'),
                    ])->columnSpan(1)

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom'),
                TextColumn::make('street')->label('Rue'),
                TextColumn::make('city')->label('Ville'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPointOfSells::route('/'),
            'create' => Pages\CreatePointOfSell::route('/create'),
            'edit' => Pages\EditPointOfSell::route('/{record}/edit'),
        ];
    }
}
