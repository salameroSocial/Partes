<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold my-6">Detalles del Cliente</h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $cliente->nombre }}
        </div>
        <!-- Agrega aquí los detalles adicionales si es necesario -->
        <div>
            <a href="{{ route('clientes.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Volver</a>
        </div>
    </div>
    
</x-app-layout>
