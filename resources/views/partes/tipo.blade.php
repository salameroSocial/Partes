<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-evenly sm:flex-row sm:justify-between">
            <h2 class="text-2xl font-bold">Partes de {{ ucfirst($tipo) }}</h2>
            <div class="mt-2 sm:mt-0">
                <a href="{{ route('partes.nuevo') }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 mb-2 sm:mb-0 sm:mr-2">Crear Parte</a>
                <a href="{{ route('fields.index') }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Modificar tipo parte</a>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        @if ($partes->isEmpty())
            <p class="text-center text-red-500 font-bold">No hay Partes de {{ $tipo }}</p>
        @else
            <!-- Aquí el contenido de la tabla de partes -->
            @foreach ($partes as $parte)
                <!-- Aquí tu contenido existente -->
            @endforeach
        @endif
    </div>
</x-app-layout>
