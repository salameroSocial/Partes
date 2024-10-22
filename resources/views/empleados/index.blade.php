<x-app-layout>
    <div class="w-full">
        <x-slot name="header">
            <div class="flex flex-col items-center justify-evenly">
                <h1 class="text-2xl font-bold mb-4">Lista de Empleados</h1>
                <a href="{{ route('empleados.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Empleado</a>
            </div>
        </x-slot>
        <div class="container mx-auto px-4 hidden sm:block">
            @if ($empleados->isEmpty())
            <p class="text-center text-red-500 font-bold">No hay empleados</p>
            @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Rango</th>
                            <th class="px-4 py-2">Precio Hora</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td class="border px-4 py-2">{{ $empleado->nombre }}</td>
                            <td class="border px-4 py-2">{{ $empleado->apellidos }}</td>
                            <td class="border px-4 py-2">{{ $empleado->rango }}</td>
                            <td class="border px-4 py-2">{{ $empleado->precio_hora }}</td>
                            <td class="border px-4 py-2 flex flex-col md:flex-row justify-center">
                                <a href="{{ route('empleados.edit', $empleado->id) }}" class="ml-0 md:ml-2 mt-2 md:mt-0 text-yellow-100 hover:text-white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-0 md:ml-2 mt-2 md:mt-0 text-red-100 hover:text-white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        <div class="block sm:hidden">
            <ul>
                @foreach ($empleados as $empleado)
                <div class="bg-gray-300 border-4 border-white text-center">
                    <li class="border px-4 py-2">
                        <p>Empleado:</p>
                        <p class="font-bold">{{ $empleado->nombre }} {{ $empleado->apellidos }}</p>
                    </li>
                    <li class="border px-4 py-2">
                        <p>Rango:</p>
                        <p class="font-bold">{{ $empleado->rango }}</p>
                    </li>
                    <li class="border px-4 py-2">
                        <p>Precio/h:</p>
                        <p class="font-bold">{{ $empleado->precio_hora }}€</p>
                    </li>
                    <li class="border px-4 py-2 flex flex-col md:flex-row justify-center">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="ml-0 md:ml-2 mt-2 md:mt-0 text-yellow-100 hover:text-white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-0 md:ml-2 mt-2 md:mt-0 text-red-100 hover:text-white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </li>

                    <hr>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>