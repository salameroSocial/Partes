<x-app-layout>
    <div class="py-4 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg overflow-x-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Detalles del Parte de Trabajo</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Datos del Parte -->
                        <div>
                            <p class="font-semibold">ID:</p>
                            <p>{{ $parte->id }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Cliente:</p>
                            <p>{{ $parte->cliente }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Fecha:</p>
                            <p>{{ $parte->fecha }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Departamento:</p>
                            <p>{{ $parte->departamento }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Hora de Llegada:</p>
                            <p>{{ $parte->hora_llegada }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Hora de Salida:</p>
                            <p>{{ $parte->hora_salida }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Horas Totales:</p>
                            <p>{{ $parte->horas_totales }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Trabajos Realizados:</p>
                            <p>{{ $parte->trabajos_realizados }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Realizado por:</p>
                            <p> {{ $parte->trabajador ? $parte->trabajador->nombre . ' ' . $parte->trabajador->apellidos : 'No asignado' }}
                            </p>
                        </div>
                        <div>
                            <p class="font-semibold">Revisado por:</p>
                            <p>{{ $parte->revisado_por }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Desplazamiento:</p>
                            <p>{{ $parte->desplazamiento ? 'Sí' : 'No' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Kilometraje:</p>
                            <p>{{ $parte->kilometraje }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Días:</p>
                            <p>{{ $parte->dias }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Maquinaria:</p>
                            <p>{{ $parte->maquinaria ? 'Sí' : 'No' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Nombre de la Maquinaria:</p>
                            <p>{{ $parte->nombre_maquinaria }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Horas de Maquinaria:</p>
                            <p>{{ $parte->horas_maquinaria }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Observaciones de Maquinaria:</p>
                            <p>{{ $parte->observaciones_maquinaria }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Estado del Trabajador:</p>
                            <p>{{ $parte->estado_trabajador }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Detalles Otros:</p>
                            <p>{{ $parte->detalles_otros }}</p>
                        </div>
                        @if($parte->fields->isNotEmpty())
                        @foreach($parte->fields as $field)
                        <div>
                            <p class="font-semibold">{{ $field->field_name }}:</p>
                            <p>{{ $field->field_value }}</p>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <!-- Enlaces para editar y eliminar el parte -->
                    <div class="mt-4">
                        <a href="{{ route('partes.index') }}" class="text-blue-500 hover:text-blue-700 mr-4">Volver
                            Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>