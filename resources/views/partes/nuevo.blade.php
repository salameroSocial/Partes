<x-app-layout>
    <br><br>
    <style>
        .form {
            border-radius: 100px;
        }

        .header_form {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .title {
            font-family: Calibri, 'Trebuchet MS', sans-serif;
            text-transform: uppercase;
            text-align: center;
            font-weight: 400;
            font-size: 1.5rem;
            width: 50%;
        }

        .img_header {
            width: 40%;
        }
    </style>
    <div class="max-w-4xl mx-auto bg-white rounded p-6 shadow-md">
        <form class="form" action="{{ route('partes.store') }}" method="POST">
            @csrf
            <!-- Cliente -->
            <div class="header_form">
                <img class="img_header" src="http://localhost/proyectos/gestionPartes/storage/app/public/logo.png" alt="logotipo de somontano social">
                <h1 class="title">Parte de la brigada de servicios múltiples</h1>
            </div>
            <div class="mb-4">
                <label for="cliente" class="block text-gray-700 font-bold mb-2">Cliente:</label>
                <select required id="cliente" name="cliente" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    <option value="default">Seleccione Cliente</option>
                    <option value="clienteNuevo">Nuevo Cliente</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->nombre }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div id="cliente_nuevo" class="mb-4 hidden">
                <label for="cliente_nombre" class="block text-gray-700 font-bold mb-2">Nombre Cliente:</label>
                <textarea id="cliente_nombre" name="cliente_nombre" rows="2" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700 font-bold mb-2">Fecha:</label>
                <input required type="date" value="12/02/2021" id="fecha" name="fecha" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Departamento -->
            <div class="mb-4">
                <label for="departamento" class="block text-gray-700 font-bold mb-2">Departamento:</label>
                <select id="departamento" name="departamento" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    <option value="">Seleccione Departamento</option>
                    <!-- Opciones dinámicas -->
                    @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->nombre }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Hora de Llegada -->
            <div class="mb-4">
                <label for="hora_llegada" class="block text-gray-700 font-bold mb-2">Hora de Llegada:</label>
                <input type="time" id="hora_llegada" name="hora_llegada" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Hora de Salida -->
            <div class="mb-4">
                <label for="hora_salida" class="block text-gray-700 font-bold mb-2">Hora de Salida:</label>
                <input type="time" id="hora_salida" name="hora_salida" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Horas Totales -->
            <div class="mb-4">
                <label for="horas_totales" class="block text-gray-700 font-bold mb-2">Horas Totales:</label>
                <input type="text" id="horas_totales" name="horas_totales" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Trabajos Realizados -->
            <div class="mb-4">
                <label for="trabajos_realizados" class="block text-gray-700 font-bold mb-2">Trabajos Realizados:</label>
                <textarea id="trabajos_realizados" name="trabajos_realizados" rows="4" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500"></textarea>
            </div>
            {{-- <input type="hidden" name="empleado_id" value="{{ $empleadoId }}"> --}}
            <!-- Realizado por -->
            <div class="mb-4">
                <label for="realizado_por" class="block text-gray-700 font-bold mb-2">Realizado por:</label>
                <select id="realizado_por" name="realizado_por" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    <option value="">Seleccione trabajador</option>
                    @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">
                        {{ $empleado->nombre }}
                        {{ $empleado->apellidos }}
                    </option>
                    @endforeach
                </select>
                {{-- <select id="empleado_id" name="realizado_por"
                    class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}">
                {{ $empleado->nombre }}
                {{ $empleado->apellidos }}
                </option>
                @endforeach
                </select> --}}
            </div>
            {{-- KMS jaio 51 --}}

            <!-- Revisado por -->
            <div class="mb-4">
                <label for="revisado_por" class="block text-gray-700 font-bold mb-2">Revisado por:</label>
                <input type="text" id="revisado_por" name="revisado_por" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Desplazamiento -->
            <div class="mb-4">
                <label for="desplazamiento" class="block text-gray-700 font-bold mb-2">Desplazamiento:</label>
                <input type="checkbox" id="desplazamiento" name="desplazamiento" value="1" class="mr-2 leading-tight">
                <label for="desplazamiento">Sí</label>
            </div>

            <!-- Detalles de Desplazamiento (Opcional) -->
            <div id="detalles_desplazamiento" class="mb-4 hidden">
                <div class="mb-2">
                    {{-- <select class="border border-gray-300 rounded-md px-1 py-1 focus:outline-none focus:border-blue-500"
                        name="desplazamiento" id="desplazamiento">
                        <option value="vehiculo">Vehiculo</option>
                    </select> --}}
                    <select class="border border-gray-300 rounded-md px-1 py-1 focus:outline-none focus:border-blue-500" name="tipo_desplazamiento" id="desplazamiento">
                        <option value="vehiculo">Vehiculo</option>
                    </select>

                    <br><br>
                    <label for="kilometraje" class="block text-gray-700 font-bold mb-2">Kilometraje:</label>
                    <input type="number" id="kilometraje" name="kilometraje" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <label for="dias" class="block text-gray-700 font-bold mb-2">Días:</label>
                    <input type="number" id="dias" name="dias" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <!-- Maquinaria -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Maquinaria:</label>
                <div>
                    <input type="checkbox" id="maquinaria" name="maquinaria" value="1" class="mr-2 leading-tight">
                    <label for="maquinaria">Sí</label>
                </div>
            </div>

            <!-- Detalles de Maquinaria (Opcional) -->
            <div id="detalles_maquinaria" class="mb-4 hidden">
                <div class="mb-2">
                    <select class="border border-gray-300 rounded-md px-1 py-1 focus:outline-none focus:border-blue-500" name="nombre_maquinaria" id="nombre_maquinaria">
                        <option value="tractor">Tractor</option>
                        <option value="cesta">Cesta</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="horas_maquinaria" class="block text-gray-700 font-bold mb-2">Horas:</label>
                    <input type="number" id="horas_maquinaria" name="horas_maquinaria" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <label for="observaciones_maquinaria" class="block text-gray-700 font-bold mb-2">Observaciones:</label>
                    <textarea id="observaciones_maquinaria" name="observaciones_maquinaria" rows="2" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500"></textarea>
                </div>
            </div>



            <!-- Precios -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Precio:</label>
                <div>
                    <input type="checkbox" id="precio" name="precio" value="1" class="mr-2 leading-tight">
                    <label for="precio">Sí</label>
                </div>
            </div>

            <!-- Detalles de Precio (Opcional) -->
            <div id="detalles_precio" class="mb-4 hidden">
                <div class="mb-2">
                    <label for="cantidad_precio" class="block text-gray-700 font-bold mb-2">Cantidad(€):</label>
                    <input type="text" id="cantidad_precio" name="cantidad_precio" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                </div>
            </div>

            @if(isset($fields) && $fields->isNotEmpty())
            @foreach ($fields as $field)
            <div class="mb-4">
                <label for="{{ $field->name }}" class="block text-gray-700 font-bold mb-2">{{ $field->label }}:</label>
                @if($field->type === 'text')
                <input type="text" id="{{ $field->name }}" name="{{ $field->name }}" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                @elseif($field->type === 'number')
                <input type="number" id="{{ $field->name }}" name="{{ $field->name }}" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                @elseif($field->type === 'date')
                <input type="date" id="{{ $field->name }}" name="{{ $field->name }}" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                @elseif($field->type === 'textarea')
                <textarea id="{{ $field->name }}" name="{{ $field->name }}" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500"></textarea>
                @elseif($field->type === 'select')
                <select id="{{ $field->name }}" name="{{ $field->name }}" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <!-- Add more options as needed -->
                </select>
                @endif
            </div>
            @endforeach
            @endif

            <!-- Estado del Trabajador -->
            <div class="mb-4">
                <label for="estado_trabajador" class="block text-gray-700 font-bold mb-2">Estado del
                    Trabajador:</label>
                <select id="estado_trabajador" name="estado_trabajador" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    <option value="">Seleccione Estado</option>
                    <option value="baja">Baja</option>
                    <option value="ausencia">Ausencia</option>
                    <option value="vacaciones">Vacaciones</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <!-- Detalles del Estado del Trabajador (Opcional) -->
            <div id="detalles_estado" class="mb-4 hidden">
                <label for="detalles_otros" class="block text-gray-700 font-bold mb-2">Detalles (Opcional):</label>
                <textarea id="detalles_otros" name="detalles_otros" rows="2" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enviar</button>
        </form>
    </div>
    {{-- @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif --}}

    <script>
        // Mostrar campos de maquinaria y detalles de estado según la selección
        document.getElementById('maquinaria').addEventListener('change', function() {
            document.getElementById('detalles_maquinaria').classList.toggle('hidden', !this.checked);
        });

        document.getElementById('estado_trabajador').addEventListener('change', function() {
            document.getElementById('detalles_estado').classList.toggle('hidden', this.value !== 'otros');
        });
        // Cuando el cliente sea interno hara magia
        document.getElementById('cliente').addEventListener('change', function() {
            document.getElementById('cliente_nuevo').classList.toggle('hidden', this.value !== 'clienteNuevo');
        });
        // Mostrar campos de kilómetros y días según la selección de desplazamiento
        document.getElementById('desplazamiento').addEventListener('change', function() {
            document.getElementById('detalles_desplazamiento').classList.toggle('hidden', !this
                .checked);

        });
        document.getElementById('precio').addEventListener('change', function() {
            document.getElementById('detalles_precio').classList.toggle('hidden', !this
                .checked);
        });



        document.addEventListener('DOMContentLoaded', function() {
            var horaLlegadaInput = document.getElementById('hora_llegada');
            var horaSalidaInput = document.getElementById('hora_salida');
            var horasTotalesInput = document.getElementById('horas_totales');

            horaLlegadaInput.addEventListener('change', calcularHorasTotales);
            horaSalidaInput.addEventListener('change', calcularHorasTotales);

            function calcularHorasTotales() {
                var horaLlegada = horaLlegadaInput.value;
                var horaSalida = horaSalidaInput.value;

                if (horaLlegada && horaSalida) {
                    var horaLlegadaSplit = horaLlegada.split(':');
                    var horaSalidaSplit = horaSalida.split(':');

                    var horaLlegadaDate = new Date();
                    horaLlegadaDate.setHours(parseInt(horaLlegadaSplit[0], 10));
                    horaLlegadaDate.setMinutes(parseInt(horaLlegadaSplit[1], 10));

                    var horaSalidaDate = new Date();
                    horaSalidaDate.setHours(parseInt(horaSalidaSplit[0], 10));
                    horaSalidaDate.setMinutes(parseInt(horaSalidaSplit[1], 10));

                    var diferenciaHorasMillis = horaSalidaDate - horaLlegadaDate;
                    var diferenciaHoras = diferenciaHorasMillis / (1000 * 60 * 60);

                    if (diferenciaHoras < 0) {
                        // Si la hora de llegada es después de la hora de salida, ajustamos para considerar que es al día siguiente
                        diferenciaHoras += 24;
                    }

                    horasTotalesInput.value = diferenciaHoras.toFixed(2);
                } else {
                    horasTotalesInput.value = '';
                }
            }
        });
    </script>
    <br><br>
</x-app-layout>


{{-- if (this.checked) {
    console.log("Marcado")
} --}}