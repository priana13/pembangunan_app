<?php

namespace App\Filament\Resources\ProyekResource\Pages;

use Filament\Actions;
use Illuminate\Support\Collection;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProyekResource;
use App\Filament\Resources\ProyekResource\Widgets\ProyekOverView;
use App\Models\Proyek;

class ListProyeks extends ListRecords
{
    protected static string $resource = ProyekResource::class;

    protected static ?string $title = "Proyek";

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()->color("success")
            ->slideOver()
            ->processCollectionUsing(function (string $modelClass, Collection $collection) {
               

                // "no" => 1
                // "nama" => "Ad Dohyan"
                // "alamat" => "Curug Nangka Ciapus-Bogor"
                // "nama_donatur" => "Sholih Ahmad Ad Dohyan"
                // "nama_perantara" => "Dammam IIRO"
                // "nama_pelaksana" => null
                // "ukuran" => "18 X 18"
                // "cp" => null
                // "koordinat" => null
                // "tahun" => 2000

                foreach ($collection as $key => $data) {

                    // dd($data["nama"]);

                    $nama = $data["nama_masjid"];

                    $nama_masjid = ($nama) ? $nama : "Kosong";

                    if($nama_masjid != "Kosong") {

                        Proyek::create([
                            "jenis_proyek_id" => 1,                    
                            "alamat" => $data['alamat'],
                            "nama_donatur" => $data['nama_donatur'],
                            "nama_perantara" => $data["nama_perantara"],
                            "nama_pelaksana" => $data["nama_pelaksana"],
                            "ukuran" => $data["ukuran"],
                            "luas" => (isset($data["luas"])) ? $data["luas"] : "",
                            "cp" => $data["cp"],
                            "koordinat" => $data["koordinat"],
                            "tahun" => $data["tahun"],
                            "nama" => $nama_masjid,      
                            "rincian" => (isset($data["rincian"])) ? $data["rincian"] : "",
                            "tanggal_mulai" => $data["tanggal_mulai"],
                            "tanggal_selesai" => $data["tanggal_selesai"],
                            "bayan" => $data["bayan"],
                            "status" => "Selesai"     
                           ]);

                    }


                }

               
                // Do some stuff with the collection
                // return $collection;
            })
            ,
            Actions\CreateAction::make()->label("Tambah"),
        ];
    }


    protected function getHeaderWidgets(): array
    {
        return [
            ProyekOverView::class,
        ];
    }
}
