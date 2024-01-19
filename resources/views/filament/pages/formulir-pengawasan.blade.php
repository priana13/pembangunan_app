<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="card bg-white shadow p-4 rounded">

    <div class="my-4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Lokasi Proyek</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
            <option selected>Pilih Proyek</option>

            @foreach($list_proyek as $proyek)

            <option value="{{$proyek->id }}">{{ $proyek->nama }}</option>

            @endforeach          
            
        </select>
    </div>


    <div class="my-4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
            <option selected>Pilih Kategori</option>

            @foreach($list_kategori as $kategori)

            <option value="{{$kategori->id }}">{{ $kategori->nama }}</option>

            @endforeach          
            
        </select>
    </div>



    <div class="my-4">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas</label>
            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required>
        </div>
    </div>


    <div>

        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Mulai</button>

    </div>

</div>





</x-filament-panels::page>
