<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class ProductResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('image_url')
                ->label('รูปภาพ'),
                TextInput::make('name')
                ->required()
                ->label('ชื่อสินค้า'),
                TextInput::make('description')
                ->label('คำอธิบาย'),
                TextInput::make('price')
                ->numeric()
                ->suffix('บาท')
                ->required()
                ->label('ราคา'),
                TextInput::make('stock')
                ->numeric()
                ->suffix('ชิ้น')
                ->required()
                ->label('จำนวนสินค้า'),
                Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('หมวดหมู่สินค้า'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                ->label('รูปภาพ'),
                TextColumn::make('name')
                ->label('ชื่อสินค้า'),
                TextColumn::make('description')
                ->label('คำอธิบาย'),
                TextColumn::make('price')
                ->label('ราคา'),
                TextColumn::make('stock')
                ->label('จำนวนสินค้า'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
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
