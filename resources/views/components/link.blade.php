@php
    $classes = "text-sm text-blue-500 hover:text-blue-900 ";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
