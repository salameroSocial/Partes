<x-app-layout>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <div class="container mx-auto">
        <div class="my-8 p-4">
            <h1 class="text-2xl font-bold mb-4">Editar Empleado</h1>
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" name="apellido" id="apellido" value="{{ $empleado->apellido }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="rango" class="block text-sm font-medium text-gray-700" value="{{$empleado->rango}}">Rango</label>
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
                    <label for="precio" class="block text-sm font-medium text-gray-700" value="{{$empleado->precio_hora}}">Precio Hora</label>
                    <input type="number" name="precio" id="precio" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Actualizar</button>
                    <a href="{{ route('empleados.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>