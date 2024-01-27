<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class SimpleItem extends Component
{
    public $nomor = 1;
    
    public $judul;

    public $jawaban;

    public $pilihan;

    public function mount( $judul ){

        $this->judul = $judul;
    }

    public function render()
    {
        return view('livewire.forms.simple-item');
    }
}
