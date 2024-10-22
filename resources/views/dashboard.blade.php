<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <br><br>

    <div class="container mx-auto p-8 bg-white">
        <header class="mb-8 hidden sm:block">
            <h1 class="text-3xl font-bold text-center text-blue-600">Enlaces rápidos:</h1>
            <nav class="mt-4 flex justify-center">
                <a href="#" class="mr-6 text-lg text-gray-700 hover:text-blue-600">Inicio</a>
                <a href="{{ route('partes.nuevo') }}" class="mr-6 text-lg text-gray-700 hover:text-blue-600">Partes de Trabajo</a>
                <a href="{{ route('clientes.index') }}" class="mr-6 text-lg text-gray-700 hover:text-blue-600">Clientes</a>
                <a href="{{ route('empleados.index') }}" class="text-lg text-gray-700 hover:text-blue-600">Empleados</a>
            </nav>
        </header>
        <hr>
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold mb-6">Manual de Usuario - Gestión de Partes</h1>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Crear Parte</h2>
                    <p class="mb-2">Para crear un nuevo parte, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside mb-4">
                        <li>Haz clic en el botón <strong>Crear Parte</strong> en la parte superior de la pantalla principal.</li>
                        <li>Completa el formulario con la información requerida:</li>
                        <ul class="list-disc list-inside pl-4">
                            <li>Cliente</li>
                            <li>Fecha</li>
                            <li>Departamento</li>
                            <li>Hora de Llegada y Salida</li>
                            <li>Trabajos Realizados</li>
                            <li>Realizado por</li>
                            <li>Desplazamiento y Maquinaria (si aplica)</li>
                        </ul>
                        <li>Haz clic en <strong>Enviar</strong> para guardar el parte.</li>
                    </ol>
                </div>
                <img src="http://localhost:8000/storage/cap1.png" alt="Crear Parte" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Editar Parte</h2>
                    <p class="mb-2">Para editar un parte existente, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside mb-4">
                        <li>Haz clic en el botón <strong>Editar</strong> junto al parte que deseas modificar en la pantalla principal.</li>
                        <li>Realiza los cambios necesarios en el formulario.</li>
                        <li>Haz clic en <strong>Guardar</strong> para actualizar el parte.</li>
                    </ol>
                </div>
                <img src="http://localhost:8000/storage/cap2.png" alt="Editar Parte" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Eliminar Parte</h2>
                    <p class="mb-2">Para eliminar un parte, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside mb-4">
                        <li>Haz clic en el botón <strong>Eliminar</strong> junto al parte que deseas borrar en la pantalla principal.</li>
                        <li>Confirma la eliminación en el cuadro de diálogo que aparece.</li>
                    </ol>
                </div>
                <img src="http://localhost:8000/storage/cap3.png" alt="Eliminar Parte" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Filtrar Partes</h2>
                    <p class="mb-2">Para filtrar los partes por diferentes criterios, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside mb-4">
                        <li>En la pantalla principal, utiliza los checkboxes y los campos de filtro para seleccionar los criterios de filtrado:</li>
                        <ul class="list-disc list-inside pl-4">
                            <li>Cliente</li>
                            <li>Departamento</li>
                            <li>Fecha</li>
                            <li>Horas</li>
                            <li>Realizado por</li>
                            <li>Nombre de la Maquinaria</li>
                            <li>Estado del Trabajador</li>
                        </ul>
                        <li>Haz clic en <strong>Aplicar Filtros</strong> para ver los resultados.</li>
                    </ol>
                </div>
                <img src="http://localhost:8000/storage/cap4.png" alt="Filtrar Partes" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Gestión de Clientes</h2>
                    <p class="mb-2">Para gestionar los clientes, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside mb-4">
                        <li>En la pantalla principal, haz clic en <strong>Clientes</strong>.</li>
                        <li>Para crear un nuevo cliente, haz clic en <strong>Crear Cliente</strong> y completa el formulario.</li>
                        <li>Para editar un cliente, haz clic en <strong>Editar</strong> junto al cliente que deseas modificar.</li>
                        <li>Para eliminar un cliente, haz clic en <strong>Eliminar</strong> junto al cliente que deseas borrar y confirma la eliminación.</li>
                    </ol>
                </div>
                <img src="http://localhost:8000/storage/cap5.png" alt="Gestión de Clientes" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>

            <section class="mb-6 flex flex-col lg:flex-row lg:items-center">
                <div class="lg:w-3/4 lg:pr-4">
                    <h2 class="text-2xl font-bold mb-4">Información Adicional</h2>
                    <p>Para más información o asistencia, contacta al administrador del sistema.</p>
                </div>
                <img src="http://localhost:8000/storage/cap1.png" alt="Información Adicional" class="lg:w-1/4 rounded shadow cursor-pointer" onclick="openModal(this.src)">
            </section>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden">
        <img id="modalImage" src="" alt="Imagen Grande" class="rounded shadow">
        <button class="absolute top-4 right-4 text-white text-2xl" onclick="closeModal()">✖</button>
    </div>

    <script>
        function openModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</x-app-layout>