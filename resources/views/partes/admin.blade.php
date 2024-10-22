<x-app-layout>

    <div class="container">
        <div class="mt-6 p-4 border rounded">
            <h2 class="text-lg font-bold mb-2">Añadir nuevo campo</h2>
            <form action="{{ route('fields.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del campo (sin espacios):</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="label" class="block text-gray-700 font-bold mb-2">Etiqueta del campo:</label>
                    <input type="text" id="label" name="label" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Tipo del campo:</label>
                    <select id="type" name="type" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                        <option value="text">Texto</option>
                        <option value="number">Número</option>
                        <option value="date">Fecha</option>
                    </select>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Agregar Campo</button>
            </form>
        </div>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
        <div class="mt-4 p-4 bg-green-500 text-white">
            {{ session('success') }}
        </div>
        @endif

        <div class="ml-2 bg-gray-300">

            <h1 class="text-3xl font-bold mb-2 ml-2 mt-2 text-center">Administrar Campos Adicionales</h1>
            <hr>
            <!-- Mostrar los campos existentes -->
            <div class="mb-4 flex flex-col justify-center">
                <h2 class="text-2xl font-semibold ml-2 mb-2">Campos Existentes</h2>
                <ul class="list-disc pl-6">
                    @foreach ($fields as $field)
                    <li class="mb-2 flex justify-between items-center">
                        <span>{{ $field->label }} ({{ $field->type }})</span>
                        <form action="{{ route('fields.destroy', $field->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mr-2">Eliminar</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</x-app-layout>