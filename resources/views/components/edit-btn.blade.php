@props(['href'])

<a {{ $attributes->merge(['class' => 'px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75']) }}
    href="{{ $href }}">
    {{ $slot }}
</a>
