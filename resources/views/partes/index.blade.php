<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-evenly sm:flex-row sm:justify-between">
            <h2 class="text-2xl font-bold">Partes</h2>
            <div class="mt-2 sm:mt-0">
                <a href="{{ route('partes.nuevo') }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 mb-2 sm:mb-0 sm:mr-2">Crear Parte</a>
                <a href="{{ route('fields.index') }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Modificar tipo parte</a>
            </div>
        </div>
    </x-slot>
    <div class="container mx-auto px-4 py-6">
        @if ($partes->isEmpty())
        <p class="text-center text-red-500 font-bold">No hay Partes</p>
        @else
        <div class="space-y-4">
            <div class="hidden sm:flex bg-gray-100 font-bold p-2 rounded">
                <div class="w-1/6 px-2">ID</div>
                <div class="w-1/6 px-2">Cliente</div>
                <div class="w-1/6 px-2">Fecha</div>
                <div class="w-1/6 px-2">Departamento</div>
                <div class="w-1/6 px-2">Realizado por</div>
                <div class="w-1/6 px-2">Acciones</div>
            </div>
            @foreach ($partes as $parte)
            <div class="flex flex-col sm:flex-row sm:items-center bg-white p-2 rounded shadow pr-2">
                <div class="flex flex-col sm:w-1/6 px-2 py-1">
                    <span class="sm:hidden font-bold">ID:</span>
                    {{ $parte->id }}
                </div>
                <div class="flex flex-col sm:w-1/6 px-2 py-1">
                    <span class="sm:hidden font-bold">Cliente:</span>
                    {{ $parte->cliente }}
                </div>
                <div class="flex flex-col sm:w-1/6 px-2 py-1">
                    <span class="sm:hidden font-bold">Fecha:</span>
                    {{ $parte->fecha }}
                </div>
                <div class="flex flex-col sm:w-1/6 px-2 py-1">
                    <span class="sm:hidden font-bold">Departamento:</span>
                    {{ $parte->departamento }}
                </div>
                <div class="flex flex-col sm:w-1/6 px-2 py-1">
                    <span class="sm:hidden font-bold">Realizado por:</span>
                    {{ $parte->trabajador ? $parte->trabajador->nombre . ' ' . $parte->trabajador->apellidos : 'No asignado' }}
                </div>
                <div class="flex flex-col sm:w-1/6 px-2 py-2 sm:flex-row sm:justify-center text-center ">
                    <a href="{{ route('partes.show', $parte->id) }}" class="mb-2 sm:mb-0 sm:mr-2 text-blue-100 hover:text-white hover:bg-blue-400 bg-blue-500 px-4 py-2 rounded">Ver</a>
                    <a href="{{ route('partes.editar', $parte->id) }}" class="mb-2 sm:mb-0 sm:mr-2 text-yellow-100 hover:text-white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                    <form action="{{ route('partes.borrar', $parte->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-100 hover:text-white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Borrar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>