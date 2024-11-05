<x-app-layout>

    <div class="container mx-auto p-6 space-y-8">
        <h1 class="text-4xl font-bold text-center mb-10">Gestión de Empleados</h1>

        <!-- Flex ajustado para poner el botón debajo de la barra de búsqueda -->
        <div class="flex flex-col justify-between items-center space-y-4 mb-6">
            <!-- Barra de búsqueda -->
            <!-- <input type="text" id="searchInput" placeholder="Buscar empleados..."
                class="max-w-sm transition-all duration-300 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300"
                style="transition: width 0.3s ease-in-out; width: 300px;"> -->

            <!-- Botón de "Añadir Empleado" en negro -->
            <a href="{{ route('empleados.create') }}" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Añadir Empleado
            </a>
        </div>

        <div x-data="{ view: 'grid' }">
            <!-- Botones para alternar la vista -->
            <div class="mb-6">
                <button @click="view = 'grid'" :class="{ 'bg-black text-white': view === 'grid' }" class="px-4 py-2 rounded-l-md border">Vista de Cuadrícula</button>
                <button @click="view = 'list'" :class="{ 'bg-black text-white': view === 'list' }" class="px-4 py-2 rounded-r-md border">Vista de Lista</button>
            </div>

            <!-- Vista de cuadrícula -->
            <div x-show="view === 'grid'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($empleados as $empleado)
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center space-y-4">
                    <img src="{{ $empleado->avatar }}" alt="{{ $empleado->nombre }} {{ $empleado->apellido }}" class="w-24 h-24 rounded-full object-cover">
                    <div class="text-center">
                        <h2 class="text-xl font-semibold">{{ $empleado->nombre }} {{ $empleado->apellido }}</h2>
                        <p class="text-sm text-gray-500">{{ $empleado->rango }}</p>
                        <p class="text-lg font-medium mt-2">${{ $empleado->precio_hora }}/hora</p>
                    </div>
                    <div class="flex space-x-2 mt-4">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="px-3 py-1 bg-gray-800 text-white rounded-md hover:bg-gray-600">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">Eliminar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Vista de lista -->
            <div x-show="view === 'list'" class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-2">Nombre</th>
                            <th class="text-left p-2">Apellido</th>
                            <th class="text-left p-2">Rango</th>
                            <th class="text-left p-2">Precio/Hora</th>
                            <th class="text-left p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                        <tr class="border-b">
                            <td class="p-2">{{ $empleado->nombre }}</td>
                            <td class="p-2">{{ $empleado->apellido }}</td>
                            <td class="p-2">{{ $empleado->rango }}</td>
                            <td class="p-2">${{ $empleado->precio_hora }}</td>
                            <td class="p-2">
                                <a href="{{ route('empleados.edit', $empleado->id) }}" class="px-3 py-1 bg-gray-800 text-white rounded-md hover:bg-gray-600 mr-2">Editar</a>
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const empleados = document.querySelectorAll('.grid > div, tbody > tr');

            // Agrandar la barra de búsqueda cuando se haga focus
            searchInput.addEventListener('focus', function() {
                searchInput.style.width = '100%'; // Aumenta al 100% de su contenedor
            });

            // Reducir el tamaño de la barra de búsqueda cuando se quite el focus
            searchInput.addEventListener('blur', function() {
                searchInput.style.width = '300px'; // Vuelve al tamaño original
            });

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                empleados.forEach(function(empleado) {
                    const text = empleado.textContent.toLowerCase();
                    empleado.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
    @endpush

</x-app-layout>