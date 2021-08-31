@props(['active'])

@php
$class = 'bg-accent text-lg font-bold text-gray-200 rounded-full py-4 px-8 shadow-lg uppercase tracking-wider hover:border-transparent hover:text-white bg-accent_hover';
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
    {{ $slot }}
</button>
