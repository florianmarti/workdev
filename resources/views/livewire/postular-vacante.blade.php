<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
        @if (session()->has('mensaje'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
                    {{ session('mensaje') }}
            </div>
        @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <!-- Etiqueta del campo -->
                <x-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
            
                <!-- Campo de entrada para cargar archivos -->
                <input id="cv" name="cv" type="file" wire:model="cv" accept=".pdf"
                    class="block mt-1 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm" />
            </div>
            
            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
            <x-primary-button class="my-5">
    {{__('Postularme')}}
            </x-primary-button>
        </form>
        @endif


    
    
</div>
