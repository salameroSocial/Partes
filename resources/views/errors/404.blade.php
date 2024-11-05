<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="container max-w-lg p-8 text-center bg-blue-200 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-red-500 mb-4">
                <p class="text-4xl font-bold text-red-500 mt-6">
                    404
                </p>
                <br>
                Not Found
            </h1>
            <p class="text-xl text-red-600 mb-6">No encontramos lo que buscas
                <!-- <p class="text-4xl">⛔⛔⛔</p> -->
            </p>

            <div class=" mt-6">
                <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-600">
                    Volver Atrás
                </a>
            </div>
        </div>
    </div>
</x-app-layout>