<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full px-6 py-8">
                    <h2 class="text-center text-2xl font-bold text-gray-700 mb-6">Añadir Nuevo Cliente</h2>
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-100 focus:border-blue-300"
                                placeholder="Ingrese el nombre del cliente">
                            @error('nombre')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-500 focus:outline-none focus:bg-green-600">
                                Guardar
                            </button>
                            <a href="{{ route('clientes.index') }}"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>