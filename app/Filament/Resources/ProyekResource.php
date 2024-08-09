<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Proyek;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProyekResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ProyekResource\RelationManagers;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Proyek';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis_proyek_id')->relationship(
                    'jenis_proyek',
                    'nama'
                )->required(),
                Fieldset::make("Data Proyek")->schema([
                    Forms\Components\TextInput::make('nama')->label("Nama Masjid/ Ponpes/ Proyek")
                        ->required()->columnSpan(3)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('alamat')->maxLength(255)->columnSpan(3),
                    Forms\Components\TextInput::make('ukuran')->maxLength(255),
                    Forms\Components\TextInput::make('luas')->maxLength(255),
                    Forms\Components\TextInput::make('cp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('koordinat')->columnSpan(3)
                    ->maxLength(255),
                Forms\Components\Textarea::make('rincian')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                ])->columns(6),     

                Fieldset::make("Pelaksanaan")->schema([
                    Forms\Components\TextInput::make('tahun')
                    ->numeric(),
                    Forms\Components\TextInput::make('nama_perantara')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nama_pelaksana')
                    ->maxLength(255),
                    Forms\Components\DatePicker::make('tanggal_mulai'),
                    Forms\Components\DatePicker::make('tanggal_selesai'),

                ])->columns(6),                
               
                Forms\Components\TextInput::make('nama_donatur')
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('akad_donatur')
                    ->maxLength(255), 
                               
                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
               
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
                    // Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
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
