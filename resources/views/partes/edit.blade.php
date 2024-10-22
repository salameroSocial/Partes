<x-app-layout>
    <div class="container mx-auto">
        <div class="max-w-2/5 mx-auto mt-10 bg-white p-8 border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Editar Parte de Trabajo</h2>

            <form action="{{ route('partes.update', $parte->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <!-- Contenido del formulario de edición -->
                    <label for="cliente" class="block text-gray-700 font-bold mb-2">Cliente:</label>
                    <select required id="cliente" name="cliente" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                        <option value="default">Seleccione Cliente</option>
                        <option value="clienteNuevo">Nuevo Cliente</option>
                        @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->nombre }}" {{ $cliente->nombre === $parte->cliente ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                        @endforeach
                    </select>

                    <!-- Fecha -->
                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700 font-bold mb-2">Fecha:</label>
                        <input required type="date" value="{{ $parte->fecha }}" id="fecha" name="fecha" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Departamento -->
                    <div class="mb-4">
                        <label for="departamento" class="block text-gray-700 font-bold mb-2">Departamento:</label>
                        <select id="departamento" name="departamento" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                            <option value="">Seleccione Departamento</option>
                            <!-- Opciones dinámicas -->
                            @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->nombre }}" {{ $departamento->nombre === $parte->departamento ? 'selected' : '' }}>
                                {{ $departamento->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hora de Llegada -->
                    <div class="mb-4">
                        <label for="hora_llegada" class="block text-gray-700 font-bold mb-2">Hora de
                            Llegada:</label>
                        <input type="time" id="hora_llegada" name="hora_llegada" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->hora_llegada }}">
                    </div>

                    <!-- Hora de Salida -->
                    <div class="mb-4">
                        <label for="hora_salida" class="block text-gray-700 font-bold mb-2">Hora de
                            Salida:</label>
                        <input type="time" id="hora_salida" name="hora_salida" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->hora_salida }}">
                    </div>

                    <!-- Horas Totales -->
                    <div class="mb-4">
                        <label for="horas_totales" class="block text-gray-700 font-bold mb-2">Horas
                            Totales:</label>
                        <input type="text" id="horas_totales" name="horas_totales" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->horas_totales }}">
                    </div>

                    <!-- Trabajos Realizados -->
                    <div class="mb-4">
                        <label for="trabajos_realizados" class="block text-gray-700 font-bold mb-2">Trabajos
                            Realizados:</label>
                        <textarea id="trabajos_realizados" name="trabajos_realizados" rows="4" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">{{ $parte->trabajos_realizados }}</textarea>
                    </div>

                    <!-- Realizado por -->
                    <div class="mb-4">
                        <label for="realizado_por" class="block text-gray-700 font-bold mb-2">Realizado
                            por:</label>
                        <select id="realizado_por" name="realizado_por" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                            <option value="">Seleccione trabajador</option>
                            @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}" {{ $parte->trabajador_id == $empleado->id ? 'selected' : '' }}>
                                {{ $empleado->nombre }} {{ $empleado->apellidos }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Revisado por -->
                    <div class="mb-4">
                        <label for="revisado_por" class="block text-gray-700 font-bold mb-2">Revisado
                            por:</label>
                        <input type="text" id="revisado_por" name="revisado_por" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->revisado_por }}">
                    </div>

                    <!-- Desplazamiento -->
                    <div class="mb-4">
                        <label for="desplazamiento" class="block text-gray-700 font-bold mb-2">Desplazamiento:</label>
                        <input type="checkbox" id="desplazamiento" name="desplazamiento" value="1" class="mr-2 leading-tight" {{ $parte->desplazamiento ? 'checked' : '' }}>
                        <label for="desplazamiento">Sí</label>
                    </div>

                    <!-- Detalles de Desplazamiento (Opcional) -->
                    <div id="detalles_desplazamiento" class="mb-4 {{ $parte->desplazamiento ? '' : 'hidden' }}">
                        <div class="mb-2">
                            <select class="border border-gray-300 rounded-md px-1 py-1 focus:outline-none focus:border-blue-500" name="tipo_desplazamiento" id="desplazamiento">
                                <option value="vehiculo">Vehiculo</option>
                            </select>

                            <br><br>
                            <label for="kilometraje" class="block text-gray-700 font-bold mb-2">Kilometraje:</label>
                            <input type="number" id="kilometraje" name="kilometraje" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->kilometraje }}">
                        </div>
                        <div class="mb-2">
                            <label for="dias" class="block text-gray-700 font-bold mb-2">Días:</label>
                            <input type="number" id="dias" name="dias" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->dias }}">
                        </div>
                    </div>

                    <!-- Maquinaria -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Maquinaria:</label>
                        <div>
                            <input type="checkbox" id="maquinaria" name="maquinaria" value="1" class="mr-2 leading-tight" {{ $parte->maquinaria ? 'checked' : '' }}>
                            <label for="maquinaria">Sí</label>
                        </div>
                    </div>

                    <!-- Detalles de Maquinaria (Opcional) -->
                    <div id="detalles_maquinaria" class="mb-4 {{ $parte->maquinaria ? '' : 'hidden' }}">
                        <div class="mb-2">
                            <select class="border border-gray-300 rounded-md px-1 py-1 focus:outline-none focus:border-blue-500" name="tipo_maquinaria" id="maquinaria">
                                <option value="tractor">Tractor</option>
                                <option value="cesta">Cesta</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="horas_maquinaria" class="block text-gray-700 font-bold mb-2">Horas:</label>
                            <input type="number" id="horas_maquinaria" name="horas_maquinaria" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->horas_maquinaria }}">
                        </div>
                        <div class="mb-2">
                            <label for="observaciones_maquinaria" class="block text-gray-700 font-bold mb-2">Observaciones:</label>
                            <textarea id="observaciones_maquinaria" name="observaciones_maquinaria" rows="2" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">{{ $parte->observaciones_maquinaria }}</textarea>
                        </div>
                    </div>

                    <!-- Precios -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Precio:</label>
                        <div>
                            <input type="checkbox" id="precio" name="precio" value="1" class="mr-2 leading-tight" {{ $parte->precio ? 'checked' : '' }}>
                            <label for="precio">Sí</label>
                        </div>
                    </div>

                    <!-- Detalles de Precio (Opcional) -->
                    <div id="detalles_precio" class="mb-4 {{ $parte->precio ? '' : 'hidden' }}">
                        <div class="mb-2">
                            <label for="cantidad_precio" class="block text-gray-700 font-bold mb-2">Cantidad(€):</label>
                            <input type="text" id="cantidad_precio" name="cantidad_precio" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500" value="{{ $parte->cantidad_precio }}">
                        </div>
                    </div>

                    <!-- Estado del Trabajador -->
                    <div class="mb-4">
                        <label for="estado_trabajador" class="block text-gray-700 font-bold mb-2">Estado
                            del
                            Trabajador:</label>
                        <select id="estado_trabajador" name="estado_trabajador" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">
                            <option value="">Seleccione Estado</option>
                            <option value="baja" {{ 'baja' === $parte->estado_trabajador ? 'selected' : '' }}>Baja
                            </option>
                            <option value="ausencia" {{ 'ausencia' === $parte->estado_trabajador ? 'selected' : '' }}>
                                Ausencia</option>
                            <option value="vacaciones" {{ 'vacaciones' === $parte->estado_trabajador ? 'selected' : '' }}>
                                Vacaciones</option>
                            <option value="otros" {{ 'otros' === $parte->estado_trabajador ? 'selected' : '' }}>Otros
                            </option>
                        </select>
                    </div>

                    <!-- Detalles del Estado del Trabajador (Opcional) -->
                    <div id="detalles_estado" class="mb-4 {{ $parte->estado_trabajador ? '' : 'hidden' }}">
                        <label for="detalles_otros" class="block text-gray-700 font-bold mb-2">Detalles
                            (Opcional):</label>
                        <textarea id="detalles_otros" name="detalles_otros" rows="2" class="w-full px-4 py-2 border rounded-md bg-gray-50 focus:outline-none focus:border-blue-500">{{ $parte->detalles_otros }}</textarea>
                    </div>
                    <!-- Agrega más campos de edición según sea necesario -->

                    <div class="flex  items-center justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">Actualizar</button>
                        <a href="{{ route('partes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Scripts y sección de errores -->
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
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</x-app-layout>