<?php

namespace App\Filament\Pages;

use App\Models\Kategori;
use App\Models\Pengawasan;
use App\Models\Proyek;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Livewire\Attributes\Validate;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class FormulirPengawasan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.formulir-pengawasan';

    protected static ?string $navigationLabel = 'Formulir';

    protected static ?int $navigationSort = 3;


    public $list_proyek;

    public $list_kategori;

    #[Validate('required')]
    public $petugas;

    #[Validate('required')] 
    public $proyek_id;

    #[Validate('required')]
    public $kategori_id;

    #[Validate('required')]
    public $pelaksana;

    public $proyek;

    public function mount(){

        $this->list_proyek = Proyek::get();

        $this->list_kategori = Kategori::get();

        $this->petugas = auth()->user()->name;
       
    }

        /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {

        ($this->proyek_id) ? $this->proyek = Proyek::find($this->proyek_id): null;

        return [];
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('proyek_id')->options(function(){

                    return Proyek::pluck('nama','id');
                })->searchable()->label("Pilih Lokasi Proyek")->required(),

                Select::make('kategori_id')->options(function(){

                    return Kategori::pluck('nama','id');
                })->searchable()->label("Pilih Lokasi Proyek")->required(),

                TextInput::make('pelaksana')->required(),
                TextInput::make('petugas')->required(),

            ]);
    }


    public function buat(){
        
        $this->validate();

        $pengawasan = Pengawasan::create([
            'kode' => uniqid(),
            'proyek_id' => $this->proyek_id,
            'tanggal' => now(),
            'kategori_id' => $this->kategori_id,
            'user_id' => auth()->user()->id,
            'pelaksana' => $this->pelaksana
        ]);

        return redirect( route('filament.admin.pages.formulir-pengawasan-detail') . '?kodePengawasan=' . $pengawasan->kode );

    }

}
