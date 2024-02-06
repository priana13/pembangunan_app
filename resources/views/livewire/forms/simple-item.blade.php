<div class="my-3"

    x-data="{
        showCatatan : false       
    }"
        
>
    <label class="my-0 py-0">

        <span class="me-1">{{ $nomor }}.</span>
        <span>{{ $judul }}</span>

    </label>

    <div class="grid grid-cols-3 gap-3 mt-1 ms-5">

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input wire:model.live="pilihan" name="pilihan-s-{{ $nomor }}" id="pilihan-s-{{ $nomor }}" type="radio" value="s" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="pilihan-s-{{ $nomor }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">S</label>
        </div>

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input wire:model.live="pilihan" name="pilihan-sc-{{ $nomor }}"  id="pilihan-sc-{{ $nomor }}" type="radio" value="sc" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="pilihan-sc-{{ $nomor }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SC</label>
        </div>

        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input wire:model.live="pilihan"  name="pilihan-pb-{{ $nomor }}" id="pilihan-pb-{{ $nomor }}" type="radio" value="pb" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="pilihan-pb-{{ $nomor }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">PB</label>
        </div>


    </div>
  
    {{-- catatan PB --}}
    <div class="mt-2 ms-5" x-show="$wire.pilihan == 'sc' || $wire.pilihan == 'pb'">               
        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Catatan" required>
    </div>


</div>  