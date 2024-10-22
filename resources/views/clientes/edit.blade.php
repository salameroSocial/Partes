<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold my-6">Editar Cliente</h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}" class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 w-full">
            </div>
            <!-- Agrega aquí los campos adicionales si es necesario -->
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Actualizar</button>
                <a href="{{ route('clientes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>