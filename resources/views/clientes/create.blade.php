<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __('Creacion de cliente') }} --}}
                    <h2 class="text-2xl">Registro de cliente:</h2>
                </div>

                {{-- <div class="container mx-auto bg-white">
        <h2 class="text-2xl font-semibold my-6">Crear Cliente</h2>
    </div> --}}

                <div class="container mx-auto w-full sm:w-2/5 bg-gray-200 p-5 rounded-xl">
                    <h2 class="text-2xl">Formulario</h2><br>
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 w-full">
                        </div>
                        <!-- Agrega aquí los campos adicionales si es necesario -->
                        <div class="mx-auto flex flex-col justify-center items-center w-2/5">
                            <br>
                            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Crear</button>
                            <br><a href="{{ route('clientes.index') }}" class="w-full text-center px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</x-app-layout>