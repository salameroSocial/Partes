<x-app-layout>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __('Creacion de cliente') }} --}}
                    <h1 class="text-2xl">Registro de empleado:</h1>
                </div>
                <div class="container mx-auto w-full sm:w-2/5 bg-gray-200 p-5 rounded-xl">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="rango" class="block text-sm font-medium text-gray-700">Rango</label>
                            <div class="relative">
                                <select class="appearance-none pr-8 pl-3 py-2 rounded-md border border-gray-300 bg-white text-gray-700 leading-tight focus:outline-none focus:border-blue-500" name="rango" id="rango">
                                    <option value="peon">Peón</option>
                                    <option value="oficial">Oficial</option>
                                    <option value="jefe">Jefe</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9.293 13.707a1 1 0 0 1-1.414-1.414l3-3a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <div class="mb-4">
                            <label for="precio_hora" class="block text-sm font-medium text-gray-700">Precio Hora</label>
                            <input type="number" name="precio_hora" id="precio_hora" step="0.01" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="mt-4 flex flex-col justify-center">
                            <button type=" submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar</button>
                            <br><a href="{{ route('empleados.index') }}" class="w-full text-center px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
                        </div>
                </div>
                </form>
            </div>
            <br><br>
        </div>
    </div>
    </div>
</x-app-layout>