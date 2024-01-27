<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $list_kategori = Kategori::get();

        foreach ($list_kategori as $key => $kategori) {


                $filePath = 'database/seeders/data/'.$kategori->nama.'.csv';   
                
                if( !file_exists($filePath) ){

                    continue;

                }


                $csvData = $this->readCsv($filePath);                

                foreach ($csvData as $row) {
                    // Ganti 'table_name' dengan nama tabel Anda
                    DB::table('sub_kategori')->insert([
                        'nama_sub' => $row[0],
                        'kategori_id' => $kategori->id,          
                        // Tambahkan kolom lain sesuai kebutuhan
                    ]);
                }

           
        } // akhir foreach kategori

    }


        /**
     * Read CSV file and return data as array.
     *
     * @param string $filePath
     * @return array
     */
    private function readCsv($filePath)
    {     

        $csvData = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $csvData[] = $data;
            }
            fclose($handle);
        }

        return $csvData;
    }
}
