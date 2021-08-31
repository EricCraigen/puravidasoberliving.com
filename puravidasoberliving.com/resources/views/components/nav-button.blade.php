@props(['active'])

@php
// $class = 'inline-block items-center px-3 py-2 font-bold bg-accent text-gray-200 rounded-full shadow-lg uppercase tracking-wider hover:border-transparent hover:text-white bg-accent_hover focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150';
$classes = ($authBtn ?? false)
            ? 'inline-block items-center px-3 py-2 font-bold bg-accent text-gray-200 rounded-full shadow-lg uppercase tracking-wider hover:border-transparent hover:text-white bg-accent_hover focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'
            : 'inline-block items-center px-2 py-1 font-bold bg-black text-white rounded-full shadow-lg uppercase tracking-wider hover:border-transparent hover:text-gray-200 hover:bg-gray-200 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150';

@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
