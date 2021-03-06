@props(['active'])

@php
$class = 'inline-block items-center px-3 py-2 font-bold bg-accent text-gray-200 rounded-full shadow-lg uppercase tracking-wider hover:border-transparent hover:text-white bg-accent_hover focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150';
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
    {{ $slot }}
</button>
