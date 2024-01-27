<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubKategoriResource\Pages;
use App\Filament\Resources\SubKategoriResource\RelationManagers;
use App\Models\SubKategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubKategoriResource extends Resource
{
    protected static ?string $model = SubKategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Config';

    protected static ?string $navigationLabel = 'Sub Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_sub')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kategori_id')->relationship('kategori', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_sub')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubKategoris::route('/'),
            // 'create' => Pages\CreateSubKategori::route('/create'),
            // 'edit' => Pages\EditSubKategori::route('/{record}/edit'),
        ];
    }
}
