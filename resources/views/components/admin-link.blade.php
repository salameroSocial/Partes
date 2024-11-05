@props(['active' => false])

@php
$classes = ($active ?? false)
? 'flex items-center px-4 py-3 rounded-lg bg-gray-700 text-gray-100 transition duration-300'
: 'flex items-center px-4 py-3 rounded-lg text-gray-100 hover:bg-gray-700 transition duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <svg class="w-5 h-5 mr-3 {{ $active ? 'text-gray-100' : 'text-gray-400 group-hover:text-gray-100' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        {{ $icon ?? '' }}
    </svg>
    <span>{{ $slot }}</span>
</a>