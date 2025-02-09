@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 relative after:absolute after:bottom-0 after:left-0 after:w-full after:rounded-t-xl after:bg-blue-500  after:h-1.5 text-sm font-medium leading-5 text-gray-800 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent   leading-5 text-gray-500 hover:text-gray-700 hover:border-blue-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
