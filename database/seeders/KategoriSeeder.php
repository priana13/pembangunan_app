<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            "Pondasi" , "Sloof", "Kolom", "Balok", "Rangka Atap", "Dinding", "Plafond", "Keramik Lantai", "Keramik Dinding", "Pengecatan", "Kusen"
        ];

        foreach ($kategori as $key => $kat) {

            Kategori::create(['nama' => $kat , 'urutan' => $key + 1]);

        }
    }
}
