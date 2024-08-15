<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengawasanResource\Pages;
use App\Filament\Resources\PengawasanResource\RelationManagers;
use App\Models\Pengawasan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengawasanResource extends Resource
{
    protected static ?string $model = Pengawasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Pengawasan';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('proyek_id')->relationship('proyek', 'nama')->searchable()->preload()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')->default(now())
                    ->required(),
                Forms\Components\Select::make('user_id')->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('pelaksana'),
                Forms\Components\Textarea::make('catatan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        "Aktif" => "Aktif", 
                        "Selesai" => "Selesai"
                    ])
                    ->default('Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proyek.nama')
                    ->numeric()
                    ->sortable(),                
                Tables\Columns\TextColumn::make('kategori.nama'),                
                Tables\Columns\TextColumn::make('user.name')->label("Petugas")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pelaksana'),
                Tables\Columns\BadgeColumn::make('status')->colors([
                    'success' => "Terkirim",
                    "warning" => "Aktif"
                ])
                    ->searchable(),
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
                SelectFilter::make('proyek_id')->relationship('proyek', "nama" , function($query){

                    return $query->whereHas('pengawasan');
                })->label("Proyek"),
                SelectFilter::make('kategori_id')->relationship('kategori', "nama")->label("Kategori"),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->url(function($record){
                    return route('filament.admin.pages.formulir-pengawasan-detail') . '?kodePengawasan=' . $record->kode;
                }),
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
            'index' => Pages\ListPengawasans::route('/'),
            'create' => Pages\CreatePengawasan::route('/create'),
            'edit' => Pages\EditPengawasan::route('/{record}/edit'),            
        ];
    }
}
