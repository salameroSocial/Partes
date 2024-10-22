<x-app-layout>
    <div class="flex flex-col md:flex-row bg-gray-200 min-h-screen">
        <!-- Sidebar de Filtros -->
        <aside class="w-full md:w-1/6 bg-gray-200 p-6 shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Filtros</h2>
            <form id="filter-form">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Cliente -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="cliente_check" class="form-checkbox">
                            <span class="ml-2">Cliente</span>
                        </label>
                        <select id="cliente" name="cliente" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                            <option value="">Seleccione un Cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->nombre }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Departamento -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="departamento_check" class="form-checkbox">
                            <span class="ml-2">Departamento</span>
                        </label>
                        <select id="departamento" name="departamento" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                            <option value="">Seleccione un Departamento</option>
                            @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->nombre }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="fecha_check" class="form-checkbox">
                            <span class="ml-2">Fecha</span>
                        </label>
                        <div id="fecha_fields" class="hidden">
                            <label for="date_from" class="block">Desde:</label>
                            <input type="date" id="date_from" name="date_from" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500">
                            <label for="date_to" class="block">Hasta:</label>
                            <input type="date" id="date_to" name="date_to" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Horas -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="horas_check" class="form-checkbox">
                            <span class="ml-2">Horas</span>
                        </label>
                        <input type="number" id="horas" name="horas" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                    </div>

                    <!-- Realizado por -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="realizado_por_check" class="form-checkbox">
                            <span class="ml-2">Realizado por</span>
                        </label>
                        <select id="realizado_por" name="realizado_por" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                            <option value="">Seleccione un Trabajador</option>
                            @foreach($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }} {{ $trabajador->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nombre de la Maquinaria -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="nombre_maquinaria_check" class="form-checkbox">
                            <span class="ml-2">Nombre de la Maquinaria</span>
                        </label>
                        <select id="nombre_maquinaria" name="nombre_maquinaria" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                            <option value="">Seleccione una maquina</option>
                            <option value="cesta">Cesta</option>
                            <option value="tractor">Tractor</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <!-- Estado del Trabajador -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="estado_trabajador_check" class="form-checkbox">
                            <span class="ml-2">Estado del Trabajador</span>
                        </label>
                        <select id="estado_trabajador" name="estado_trabajador" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:border-blue-500 hidden">
                            <option value="">Seleccione un Estado</option>
                            <option value="baja">Baja</option>
                            <option value="ausencia">Ausencia</option>
                            <option value="vacaciones">Vacaciones</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" id="apply-filters" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Aplicar Filtros</button>
                </div>
            </form>
        </aside>

        <!-- Contenedor Principal -->
        <main class="flex-1 bg-white p-6 shadow-md mt-4 md:mt-0">
            <h2 class="text-2xl font-semibold mb-4">Vista Previa de los Partes</h2>
            <div id="preview-container">
                <!-- Aquí se cargará la vista previa de los partes -->
            </div>
            <div class="mt-4">
                <form action="{{ route('export') }}" method="GET" id="export-form">
                    <!-- Campos ocultos para enviar filtros -->
                </form>
                <button type="submit" form="export-form" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Exportar a Excel</button>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleField(checkboxId, fieldId) {
                document.getElementById(checkboxId).addEventListener('change', function() {
                    const field = document.getElementById(fieldId);
                    field.classList.toggle('hidden', !this.checked);
                });
            }

            toggleField('cliente_check', 'cliente');
            toggleField('departamento_check', 'departamento');
            toggleField('fecha_check', 'fecha_fields');
            toggleField('horas_check', 'horas');
            toggleField('realizado_por_check', 'realizado_por');
            toggleField('nombre_maquinaria_check', 'nombre_maquinaria');
            toggleField('estado_trabajador_check', 'estado_trabajador');

            document.getElementById('apply-filters').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('filter-form'));
                const params = new URLSearchParams(formData).toString();

                fetch(`/preview?${params}`)
                    .then(response => response.json())
                    .then(data => {
                        const previewContainer = document.getElementById('preview-container');
                        previewContainer.innerHTML = '';

                        if (data.message) {
                            const alert = document.createElement('div');
                            alert.classList.add('bg-yellow-100', 'border', 'border-yellow-400', 'text-yellow-700', 'px-4', 'py-3', 'rounded', 'relative', 'mb-4');
                            alert.innerHTML = `
                                <span class="block sm:inline">${data.message}</span>
                            `;
                            previewContainer.appendChild(alert);
                        } else {
                            data.forEach(parte => {
                                const div = document.createElement('div');
                                div.classList.add('mb-4', 'p-4', 'border', 'rounded', 'bg-gray-50');
                                div.innerHTML = `
                                    <p><strong>ID:</strong> ${parte.id}</p>
                                    <p><strong>Cliente:</strong> ${parte.cliente}</p>
                                    <p><strong>Fecha:</strong> ${parte.fecha}</p>
                                    <!-- Añadir aquí más campos de los partes según sea necesario -->
                                `;
                                previewContainer.appendChild(div);
                            });
                        }

                        // Actualizar los campos ocultos del formulario de exportación
                        const exportForm = document.getElementById('export-form');
                        exportForm.innerHTML = '';
                        formData.forEach((value, key) => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = value;
                            exportForm.appendChild(input);
                        });
                    });
            });
        });
    </script>
</x-app-layout>