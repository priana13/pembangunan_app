<x-filament-panels::page>

 @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="card bg-white p-3 rounded">
            <h2 class="my-0 py-0">Masjid: <span class="font-bold">{{ $record->proyek->nama }}</span> </h2>
        <h2 class="my-0 py-0">Alamat: <span class="font-bold">{{ $record->proyek->alamat }}</span></h2>
        <h2 class="my-0 py-0">Kategori Pengerjaan: <span class="font-bold">{{ $record->kategori->nama }}</span></h2>
    </div>


</x-filament-panels::page>
