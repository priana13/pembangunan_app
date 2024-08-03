<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyekResource\Pages;
use App\Filament\Resources\ProyekResource\RelationManagers;
use App\Models\Proyek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Proyek';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255),
                Forms\Components\Select::make('jenis_proyek_id')->relationship(
                    'jenis_proyek',
                    'nama'
                )->required(),
                Forms\Components\TextInput::make('nama_donatur')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_perantara')
                    ->maxLength(255),
                Forms\Components\TextInput::make('akad_donatur')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_pelaksana')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ukuran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('luas')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('koordinat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->numeric(),
                Forms\Components\Textarea::make('rincian')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_mulai'),
                Forms\Components\DatePicker::make('tanggal_selesai'),
                Forms\Components\TextInput::make('bayan')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        "Pengajuan" => "Pengajuan",
                        "Survei" => "Survei",
                        "Pembangunan" => "Pembangunan",
                        "Selesai" => "Selesai"
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_proyek.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun')                   
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_donatur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_perantara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('akad_donatur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_pelaksana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ukuran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('luas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('koordinat')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bayan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('jenis_proyek_id')->relationship('jenis_proyek', 'nama')->label("Jenis Proyek"),
                SelectFilter::make('status')->options([
                    "Pengajuan" => "Pengajuan",
                    "Survei" => "Survei",
                    "Pembangunan" => "Pembangunan",
                    "Selesai" => "Selesai"
                ]),
                SelectFilter::make("tahun")->options(function() {

                    $tahun = [];

                    for ($i=2000; $i <= intval( date('Y') ); $i++) { 
                        $tahun[$i] = $i;
                    }

                    return $tahun;

                })->searchable()
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
            'index' => Pages\ListProyeks::route('/'),
            'create' => Pages\CreateProyek::route('/create'),
            'edit' => Pages\EditProyek::route('/{record}/edit'),
        ];
    }
}
