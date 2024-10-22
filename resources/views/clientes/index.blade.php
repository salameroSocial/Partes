<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-evenly sm:flex-row sm:justify-between">
            <h2 class="text-2xl font-bold">Clientes</h2>
            <a href="{{ route('clientes.create') }}" class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 mt-4 sm:mt-0">Crear Cliente</a>
        </div>
    </x-slot>
    <div class="container mx-auto px-4 py-6 hidden sm:block">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">ID</th>
                        <th class="px-4 py-2 border border-gray-300">Nombre</th>
                        <th class="px-4 py-2 border border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{ $cliente->id }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $cliente->nombre }}</td>
                        <td class="px-4 py-2 border border-gray-300 flex flex-col sm:flex-row justify-center">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="mb-2 sm:mb-0 sm:mr-2 text-yellow-100 hover:text-white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-100 hover:text-white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="popup" style="display: none;">
        <h2>Información del Cliente</h2>
        <p>Nombre: Juan Pérez</p>
        <p>Correo Electrónico: juan@example.com</p>
        <button id="cerrarPopup">Cerrar</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var botonMostrar = document.getElementById('mostrarPopup');
            var popup = document.getElementById('popup');
            var botonCerrar = document.getElementById('cerrarPopup');

            botonMostrar.addEventListener('click', function() {
                popup.style.display = 'block';
            });

            botonCerrar.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script>
    <div class="block sm:hidden">
        <ul>
            @foreach ($clientes as $cliente)
            <div class="bg-gray-300 border-4 border-white text-center">
                <tr>
                    <li class="px-4 py-2 border border-gray-300">
                        <p>Cliente Nº:</p>
                        <p class="font-bold">{{ $cliente->id }}</p>
                    </li>
                    <li class="px-4 py-2 border border-gray-300">
                        <p>Nombre:</p>
                        <p class="font-bold">{{ $cliente->nombre }}</p>
                    </li>
                    <li class="px-4 py-2 border border-gray-300 flex flex-col sm:flex-row justify-center">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="mb-2 sm:mb-0 sm:mr-2 text-yellow-100 hover:text-white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-100 hover:text-white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </li>
                </tr>
            </div>
            @endforeach
        </ul>
    </div>

</x-app-layout>