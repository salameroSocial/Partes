<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="container max-w-lg p-8 text-center bg-gray-600  rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-yellow-500 mb-4">
                <p class="text-4xl font-bold text-yellow-500 mt-6">
                    ⚠️403⚠️
                </p>
                <br>
                Acceso Denegado
            </h1>
            <p class="text-xl text-yellow-600 mb-6">No tienes permiso para acceder a esta página.
            <p class="text-4xl">⚠️⚠️⚠️</p>
            </p>

            <div class=" mt-6">
                <a href="{{ url()->previous() }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-800">
                    Volver Atrás
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
