<div> 
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
     {{-- @if (count($vacantes) > 0) --}}
         
      
@forelse ($vacantes as $vacante)
    <div class="p-6 bg-white  border-gray-200 md:flex md:justify-between md:items-center">
         
        <div class="space-y-3">
             
            <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                 {{$vacante->titulo}}
             </a>
             <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
             <p class="text-sm text-gray-500 font-bold">Ultimo día:  {{ $vacante->ultimo_dia->format('d/m/y') }}</p>
        </div>
    
    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
<!-- Botón Candidatos -->
<livewire:boton-accion 
href="#" 
color="bg-slate-800" 
hoverColor="hover:bg-slate-700" 
text="Candidatos" />

<!-- Botón Editar -->
<livewire:boton-accion 
href="{{route('vacantes.edit', $vacante->id)}}" 
color="bg-blue-600" 
hoverColor="hover:bg-blue-800" 
text="Editar" />

<!-- Botón Eliminar -->
@foreach ($vacantes as $vacante)
    <livewire:boton-accion 
        :vacante="$vacante->id"
        href="#"
        color="bg-red-600"
        hoverColor="hover:bg-red-800"
        text="Eliminar"
    />
@endforeach

 

    </div>
</div>
    
    @empty
    <p class="p-3 text-sm text-center text-gray-400">No hay vacantes</p>
    @endforelse
</div>
<div class=" mt-10">
{{ $vacantes->links() }}
</div>
</div>
@push('scripts')
<!-- SweetAlert Script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleccionar todos los botones de eliminación
        const eliminarBtns = document.querySelectorAll('.eliminar-btn');

        eliminarBtns.forEach(btn => {
            btn.addEventListener('click', function (event) {
                event.preventDefault(); // Evita la navegación predeterminada

                // Obtener el ID de la vacante del atributo data-id
                const vacante = btn.getAttribute('data-id');
 
 
                // Mostrar la alerta SweetAlert
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Emitir un evento de Livewire pasando el ID de la vacante
                        Livewire.emit('eliminarVacante', vacante);
                        // Mensaje de éxito (puede omitirse si prefieres que Livewire maneje el mensaje)
                        Swal.fire(
                            'Eliminado',
                            'El registro ha sido eliminado.',
                            'success'
                        );
                    }
                });
            });
        });
    });
</script>

@endpush