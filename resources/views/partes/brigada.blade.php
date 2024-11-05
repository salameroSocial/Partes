<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 space-y-8">
        <h1 class="text-2xl font-bold">Formulario de Logística</h1>

        <form action="" method="POST" class="space-y-6 ">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="albaran" class="block text-sm font-medium text-gray-700">Albarán de mercancía número</label>
                    <input type="text" id="albaran" name="albaran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Introducir número de albarán">
                </div>

                <div class="space-y-2">
                    <label for="pedido" class="block text-sm font-medium text-gray-700">Número de pedido</label>
                    <select id="pedido" name="pedido" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Seleccionar número de pedido</option>
                        @for ($i = 1; $i <= 20; $i++)
                            <option value="pedido-{{ $i }}">Pedido {{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="fecha_envio" class="block text-sm font-medium text-gray-700">Fecha de envío</label>
                    <input type="date" id="fecha_envio" name="fecha_envio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="space-y-2">
                    <label for="tipo_material" class="block text-sm font-medium text-gray-700">Tipo de material</label>
                    <select id="tipo_material" name="tipo_material" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Seleccionar tipo de material</option>
                        <option value="tipo1">Tipo 1</option>
                        <option value="tipo2">Tipo 2</option>
                        <option value="tipo3">Tipo 3</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ingresar cantidad">
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-xl font-semibold">Información para imprimir</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                    $camposImprimir = [
                    'Transportista' => 'Aventín',
                    'Portes' => 'Pagados',
                    'Razón social' => 'Brilen / Novapet',
                    'Dirección' => 'Polígono Industrial Valle del Cinca',
                    'Población' => '22300 Barbastro',
                    'Contacto' => 'Miguel Sierra, Cristian Sierra, Ángel Garcés',
                    'Teléfono' => '611 137 547',
                    'Remitente' => 'Somontano Social S.L.',
                    ];
                    @endphp

                    @foreach ($camposImprimir as $label => $valor)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                        <input type="text" value="{{ $valor }}" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm" readonly>
                    </div>
                    @endforeach

                    <div>
                        <label for="peso" class="block text-sm font-medium text-gray-700">Peso</label>
                        <input type="text" id="peso" name="peso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="A ingresar por el transportista">
                    </div>

                    <div>
                        <label for="firma" class="block text-sm font-medium text-gray-700">Nombre y firma del receptor</label>
                        <input type="text" id="firma" name="firma" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm" placeholder="Campo para firmar en el documento impreso" readonly>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-black text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Enviar formulario
            </button>
        </form>
    </div>
</x-app-layout>