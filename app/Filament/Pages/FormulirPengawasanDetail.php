<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Pengawasan;

class FormulirPengawasanDetail extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.formulir-pengawasan-detail';

    protected static bool $shouldRegisterNavigation = false;

    public $record;

    public $sub_kategori;

    public function mount(){

        $kodePengawasan = request()->kodePengawasan;

        $this->record = Pengawasan::where('kode', $kodePengawasan)->first();
     

        if(!$this->record){
            abort(404);
        }
        
        $this->sub_kategori = $this->record->kategori->sub_kategori;
        
 
 
     }
 
     public function kirim_laporan(){
 
         $this->record->status = "Terkirim";
         $this->record->save();

         return redirect()->route('filament.admin.resources.pengawasans.index');
     }
     
}
