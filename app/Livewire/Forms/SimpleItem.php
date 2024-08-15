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

    public $pengawasan_id;

    public $item_pengawasan; 

    public function mount( $pengawasan , $judul , $sub_kategori_id ){
      
        $this->pengawasan_id = $pengawasan;
        $this->judul = $judul;
        $this->sub_kategori_id = $sub_kategori_id;
        $this->nomor = $sub_kategori_id;

        $item_pengawasan = ItemPengawasan::where('pengawasan_id', $pengawasan)->where('sub_kategori_id', $sub_kategori_id)->first();
     

        if($item_pengawasan){

            $this->pilihan = $item_pengawasan->ket;
            $this->catatan = $item_pengawasan->catatan;
            
        }

    }

    public function render()
    {
        return view('livewire.forms.simple-item');
    }

    public function pilihJawaban($pilihan){

        $sub_kategori = SubKategori::find($this->sub_kategori_id);

        // $item_pengawasan = ItemPengawasan::create([
        //     "sub_kategori_id" => $this->sub_kategori_id,
        //     "kategori_id" => $sub_kategori->kategori_id,
        //     "pengawasan_id" => $this->pengawasan_id
        //     ,
        //     "user_id" => auth()->user()->id,
        //     "ket" => $pilihan,
        //     "catatan" => $this->catatan
        // ]);

        $item_pengawasan = ItemPengawasan::updateOrCreate(
            [
                "sub_kategori_id" => $this->sub_kategori_id,
                "kategori_id" => $sub_kategori->kategori_id,
                "pengawasan_id" => $this->pengawasan_id,
                "user_id" => auth()->user()->id
            ],
            [
                "ket" => $pilihan,
                "catatan" => $this->catatan

            ]);

        Notification::make("success", "Pesan");
    }

    public function ubahCatatan(){


        $sub_kategori = SubKategori::find($this->sub_kategori_id);
    
        $item_pengawasan = ItemPengawasan::updateOrCreate(
            [
                "sub_kategori_id" => $this->sub_kategori_id,
                "kategori_id" => $sub_kategori->kategori_id,
                "pengawasan_id" => $this->pengawasan_id,               
            ],
            [                
                "catatan" => $this->catatan

            ]);


    }

}
