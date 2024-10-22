<x-app-layout>
    @if ($partes->isEmpty())
        <p class="text-center text-red-500 font-bold">No hay Partes</p>
    @else
        <table class="w-full border-collapse border border-gray-300 bg-white">
            <thead>
                <tr>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        ID
                    </th>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        Cliente
                    </th>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        Fecha
                    </th>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        Departamento
                    </th>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        Realizado por
                    </th>
                    <th scope="col" class="px-4 py-2 border border-gray-300">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partes as $parte)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{ $parte->id }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $parte->cliente }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $parte->fecha }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $parte->departamento }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $parte->realizado_por }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <a href="{{ route('partes.show', $parte->id) }}"
                                class="ml-2 text-blue-100 hover:white hover:bg-blue-400 bg-blue-500 px-4 py-2 rounded">Ver</a>
                            <a href="{{ route('partes.editar', $parte->id) }}"
                                class="ml-2 text-yellow-100 hover:white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                            <form action="{{ route('partes.borrar', $parte->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="ml-2 text-red-100 hover:white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-app-layout>
