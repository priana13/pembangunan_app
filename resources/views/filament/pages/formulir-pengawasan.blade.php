<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="card bg-white shadow p-4 rounded sm:w-1/2">

    <form wire:submit="buat">
        {{ $this->form }}
        
        <div class="text-end my-2">

            <button type="submit" class="text-white bg-blue-500 rounded-md shadow px-3 py-2">
                Berikutnya
            </button>

        </div>

    </form>

</div>


</x-filament-panels::page>
