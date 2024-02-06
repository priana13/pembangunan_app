<?php

namespace App\Livewire\Forms;

use App\Models\ItemPengawasan;
use App\Models\SubKategori;
use Filament\Notifications\Notification;
use Livewire\Component;

class SimpleItem extends Component
{
    public $sub_kategori_id = 1;

    public $nomor;
    
    public $judul;

    public $jawaban;

    public $pilihan;

    public $catatan;

    public function mount( $judul , $sub_kategori_id ){

        $this->judul = $judul;
        $this->sub_kategori_id = $sub_kategori_id;
        $this->nomor = $sub_kategori_id;
    }

    public function render()
    {
        return view('livewire.forms.simple-item');
    }

    public function pilihJawaban($pilihan){

        $sub_kategori = SubKategori::find($this->sub_kategori_id);

        $item_pengawasan = ItemPengawasan::create([
            "sub_kategori_id" => $this->sub_kategori_id,
            "kategori_id" => $sub_kategori->kategori_id,
            "pengawasan_id" => 1,
            "user_id" => auth()->user()->id,
            "ket" => $pilihan,
            "catatan" => $this->catatan
        ]);

        Notification::make("success", "Pesan");
    }

}
