@php
    use App\Http\Livewire\Vacante;
@endphp
<div class="p-10">
    <div class="mb-5 ">
        <h3 class="font-bold text-xl my-3 text-gray-800">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-100 rounded-md p-2 my-10">
            <p class="font-bold text-sm text-gray-800 my-3 uppercase">
                Empresa: <span class="normal-case font-normal">{{ $vacante->empresa  }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-3 uppercase">
                Ultimo dia para postularse: <span class="normal-case font-normal">{{ $vacante->ultimo_dia->format('d-m-Y') }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-3 uppercase">
                Categoria: <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>
            <p class="font-bold text-sm text-gray-800 my-3 uppercase">
                Salario: <span class="normal-case font-normal">{{ $vacante->salario->salario  }}</span>
            </p>
            
            
            
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 bg-gray-100 rounded-md p-2 my-10 gap-4  ">
        <div class="md:col-span-2">
            <p class="font-bold text-sm text-gray-800 my-3 uppercase">
                Imagen: 
                <span class="normal-case font-normal">
                    <img 
                    src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" 
                    alt="{{'Imagen Vacante' . $vacante->titulo}}">
                </span>
            </p>
        </div>
        <div class="md:col-span-4 mt-2">
            <h2 class="text-2xl font-bold mb-5  ">
                Descripcion:</h2>
                 <p class="normal-case font-normal">{{ $vacante->descripcion  }}</p>
             
        </div>
    </div>
   
    @guest
        <div class="mt-5 border border-dashed p-5 text-center bg-gray-50">
            <p>¿Deseas postularte a esta vacante?
                <a class="font-bold text-indigo-500 pl-2" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes!!</a>
            </p>
        </div>
    @endguest
    <!--Muestra la indormacion solo a un usuario -->
     
    @cannot('create', App\Models\Vacante::class)
        
    <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
     
    


         
         
</div>
 
