<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="card bg-white shadow p-4 rounded sm:w-1/2">

    <div class="my-4">
        <label for="proyek_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Lokasi Proyek</label>
        <select wire:model.live="proyek_id" id="proyek_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
            <option selected>Pilih Proyek</option>

            @foreach($list_proyek as $proyek)

            <option value="{{$proyek->id }}">{{ $proyek->nama }}</option>

            @endforeach          
            
        </select>

        @error('proyek_id') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    @if($proyek_id)

    <p>
        Alamat: <strong>{{ $proyek->alamat }}</strong>
    </p>

    @endif


    <div class="my-4">
        <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
        <select wire:model="kategori_id" id="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
            <option selected>Pilih Kategori</option>

            @foreach($list_kategori as $kategori)

            <option value="{{$kategori->id }}">{{ $kategori->nama }}</option>

            @endforeach          
            
        </select>
        @error('kategori_id') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="my-4">
        <div>
            <label for="pelaksana" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelaksana</label>
            <input wire:model="pelaksana" type="text" id="pelaksana" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pelaksana" required>
        </div>
        @error('pelaksana') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>


    <div class="my-4">
        <div>
            <label for="petugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas</label>
            <input wire:model="petugas" type="text" id="petugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required>
        </div>
        @error('petugas') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>


    <div class="text-end">

        <button wire:click="buat" type="button" class="text-white bg-blue-500 rounded-md shadow px-3 py-2">Berikutnya</button>

    </div>

</div>


</x-filament-panels::page>
