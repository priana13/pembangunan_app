<x-filament-panels::page>

 @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="sm:w-3/4 mx-auto">

        <div class="card bg-white p-3 rounded">
             <h2 class="my-0 py-0">Masjid: <span class="font-bold">{{ $record->proyek->nama }}</span> </h2>
            <h2 class="my-0 py-0">Alamat: <span class="font-bold">{{ $record->proyek->alamat }}</span></h2>
            <h2 class="my-0 py-0">Pelaksana: <span class="font-bold">{{ $record->pelaksana }}</span></h2>
            <h2 class="my-0 py-0">Kategori Pengerjaan: <span class="font-bold">{{ $record->kategori->nama }}</span></h2>
        </div>
    

        <div class="card bg-white p-3 rounded">
            <h2 class="text-2xl">Item Pemantauan Pembangunan</h2>  
            
        
            @foreach( $sub_kategori as $item)

            <livewire:forms.simple-item sub_kategori_id="{{ $item->id }}" wire:key="test{{ $item->id }}" id="test1" judul="{{ $item->nama_sub }}" />

            @endforeach

{{--         
            <div class="text-end">

                <button wire:click="kirim_laporan" type="button" class="text-white bg-blue-500 rounded-md shadow px-3 py-2">Kirim Laporan</button>
        
            </div> --}}


        </div>


        
    </div>

</x-filament-panels::page>
