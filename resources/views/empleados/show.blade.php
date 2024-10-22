<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Detalles del Empleado -->
                    <div>
                        <p class="font-bold">ID:</p>
                        <p>{{ $empleado->id }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-bold">Nombre:</p>
                        <p>{{ $empleado->nombre }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-bold">Email:</p>
                        <p>{{ $empleado->email }}</p>
                    </div>
                    <!-- Agrega más detalles según las propiedades de tu modelo Empleado -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
