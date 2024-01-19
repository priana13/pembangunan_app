<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@alhudabogor.org',
            'password' => Hash::make('bismillah')
        ]);


        \App\Models\JenisProyek::create([
            'nama' => "Masjid"
        ]);


        \App\Models\Proyek::create([
            'nama' => "Masjid Annur",
            'alamat' => "Bogor", 
            'jenis_proyek_id' => 1,

        ]);

        \App\Models\Kategori::create([
            'nama' => "Pembuatan Pondasi"        
            
        ]);

        
    }
}
