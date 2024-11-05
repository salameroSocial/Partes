<x-app-layout>

    <div class="min-h-screen bg-gradient-to-b from-blue-100 to-white">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-center text-blue-800 mb-4">Gestión de Partes</h1>
            <p class="text-xl text-center text-gray-600 mb-8">
                Selecciona el tipo de parte que deseas dar de alta
            </p>

            <!-- Grid para los tipos de partes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $parteTypes = [
                ['title' => 'Parte de Brigada', 'description' => 'Brigada con o sin vehiculos', 'icon' => 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z M14 2v6h6 M16 13H8 M16 17H8 M10 9H8', 'href' => '/partes/nuevo/brigada'],
                ['title' => 'Parte de Servicios de limpieza', 'description' => 'Registro de limpieza', 'icon' => 'M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z', 'href' => '/nuevo-parte/maquinaria'],
                ['title' => 'Parte de Recepcion', 'description' => 'Para el registro de recepcion', 'icon' => 'M1 3h15M16 8H1m15 5H1m15 5H1M5 3v17M10 3v17', 'href' => '/nuevo-parte/vehiculo'],
                ['title' => 'Parte de Brilen', 'description' => 'Parte de envios de camion', 'icon' => 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2 M9 7a4 4 0 1 0 0-8 4 4 0 0 0 0 8z M23 21v-2a4 4 0 0 0-3-3.87 M16 3.13a4 4 0 0 1 0 7.75', 'href' => '/nuevo-parte/personal'],
                ];
                @endphp

                @foreach ($parteTypes as $type)
                <a href="{{ $type['href'] }}" class="transform transition duration-500 hover:scale-105">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full">
                        <div class="p-6">
                            <div class="flex flex-col items-center">
                                <div class="bg-blue-100 p-3 rounded-full mb-4">
                                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $type['icon'] }}"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-center mb-2">{{ $type['title'] }}</h3>
                            </div>
                            <p class="text-gray-600 text-center">{{ $type['description'] }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <!-- Botones para editar partes ya creados -->
            <div class="sm-mt-0 mt-12">
                <h2 class="text-3xl font-semibold text-center text-green-700 mb-4">Editar Partes ya Creados</h2>
                <p class="text-xl text-center text-gray-600 mb-8">
                    Selecciona la categoria del parte:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="{{route('partes.edita')}}" class="transform transition duration-500 hover:scale-105">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden h-full p-6">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 p-3 rounded-full mb-4">
                                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17H8M10 9H8"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-center mb-2">Editar Brigada</h3>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('partes.edita') }}" class="transform transition duration-500 hover:scale-105">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden h-full p-6">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 p-3 rounded-full mb-4">
                                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17H8M10 9H8"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-center mb-2">Editar Servicios</h3>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('partes.edita') }}" class="transform transition duration-500 hover:scale-105">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden h-full p-6">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 p-3 rounded-full mb-4">
                                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17H8M10 9H8"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-center mb-2">Editar Conserjería</h3>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('partes.edita') }}" class="transform transition duration-500 hover:scale-105">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden h-full p-6">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 p-3 rounded-full mb-4">
                                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17H8M10 9H8"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-center mb-2">Editar Brilen</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>