<button 
    type="button"
    class="{{ $color }} {{ $hoverColor }} py-3 my-1 px-4 rounded-lg text-white text-xs font-bold uppercase text-center {{ $text === 'Eliminar' ? 'eliminar-btn' : '' }}"
    data-id="{{ $vacante ?? '' }}"   
    @if ($href && $text !== 'Eliminar')
        onclick="window.location.href='{{ $href }}'"
    @endif
>
    {{ $text }}
</button>
