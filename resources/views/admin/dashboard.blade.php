@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm font-medium">Total Usuarios</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="text-2xl font-bold">{{ $totalUsuarios }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm font-medium">Partes Pendientes</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div class="text-2xl font-bold">{{ $partesPendientes }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm font-medium">Trabajadores activos</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div class="text-2xl font-bold">{{ $ingresosMensuales }}</div>
        </div>
    </div>

    <div x-data="{ activeTab: 'usuarios' }" class="mb-6">
        <nav class="flex space-x-4 mb-4">
            <button @click="activeTab = 'usuarios'" :class="{ 'bg-blue-500 text-white': activeTab === 'usuarios' }" class="px-4 py-2 rounded-md">Usuarios</button>
            <button @click="activeTab = 'partes'" :class="{ 'bg-blue-500 text-white': activeTab === 'partes' }" class="px-4 py-2 rounded-md">Partes</button>
            <button @click="activeTab = 'inventario'" :class="{ 'bg-blue-500 text-white': activeTab === 'inventario' }" class="px-4 py-2 rounded-md">Inventario</button>
            <button @click="activeTab = 'reportes'" :class="{ 'bg-blue-500 text-white': activeTab === 'reportes' }" class="px-4 py-2 rounded-md">Reportes</button>
            <button @click="activeTab = 'configuracion'" :class="{ 'bg-blue-500 text-white': activeTab === 'configuracion' }" class="px-4 py-2 rounded-md">Configuración</button>
        </nav>

        <div x-show="activeTab === 'usuarios'" class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Gestión de Usuarios</h2>
            <p class="text-gray-600 mb-4">Administra los usuarios de la aplicación</p>
            <div class="flex space-x-2 mb-4">
                <input type="text" placeholder="Buscar usuarios..." class="flex-grow px-4 py-2 border rounded-md">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Buscar</button>
            </div>
            <a href="{{ route('admin.usuarios.crear') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2">Crear Nuevo Usuario</a>
            <a href="{{ route('admin.usuarios.index') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Ver Todos los Usuarios</a>
        </div>

        <div x-show="activeTab === 'partes'" class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Gestión de Partes</h2>
            <p class="text-gray-600 mb-4">Administra los partes de trabajo</p>
            <div class="flex space-x-2 mb-4">
                <input type="text" placeholder="Buscar partes..." class="flex-grow px-4 py-2 border rounded-md">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Buscar</button>
            </div>
            <a href="{{ route('partes.nuevo') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2">Crear Nuevo Parte</a>
            <a href="{{ route('partes.index') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Ver Todos los Partes</a>
        </div>

        <div x-show="activeTab === 'inventario'" class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Gestión de Inventario</h2>
            <p class="text-gray-600 mb-4">Administra el inventario de piezas y herramientas</p>
            <div class="flex space-x-2 mb-4">
                <input type="text" placeholder="Buscar en inventario..." class="flex-grow px-4 py-2 border rounded-md">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Buscar</button>
            </div>
            <a href="" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2">Agregar Item al Inventario</a>
            <a href="" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Ver Inventario Completo</a>
        </div>

        <div x-show="activeTab === 'reportes'" class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Reportes y Análisis</h2>
            <p class="text-gray-600 mb-4">Genera y visualiza reportes de la aplicación</p>
            <a href="" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mr-2">Reporte Mensual</a>
            <a href="" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mr-2">Reporte Anual</a>
            <a href="" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Reporte Personalizado</a>
        </div>

        <div x-show="activeTab === 'configuracion'" class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Configuración del Sistema</h2>
            <p class="text-gray-600 mb-4">Ajusta la configuración de la aplicación</p>
            <a href="" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mr-2">Configuración General</a>
            <a href="" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mr-2">Configurar Notificaciones</a>
            <a href="" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Respaldo y Restauración</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{" class="flex items-center justify-start space-x-2 px-4 py-2 bg-white rounded-md shadow hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Gestionar Técnicos</span>
        </a>
        <a href="" class="flex items-center justify-start space-x-2 px-4 py-2 bg-white rounded-md shadow hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
            <span>Gestionar Vehículos</span>
        </a>
        <a href="" class="flex items-center justify-start space-x-2 px-4 py-2 bg-white rounded-md shadow hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Calendario de Trabajos</span>
        </a>
        <a href="" class="flex items-center justify-start space-x-2 px-4 py-2 bg-white rounded-md shadow hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span>Búsqueda Avanzada</span>
        </a>
    </div>
</div>
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-10">Administración de Usuarios</h1>

    <!-- Botón para abrir el modal -->
    <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
        Ver Usuarios
    </button>

    <!-- Modal de Usuarios -->
    <div x-data="{ open: false }" x-cloak>
        <!-- Modal Overlay -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <!-- Modal Content -->
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
                <!-- Botón para cerrar el modal -->
                <button @click="open = false" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

                <h2 class="text-xl font-semibold mb-4">Lista de Usuarios</h2>

                <!-- Listado de usuarios -->
                <ul>
                    @foreach($usuarios as $usuario)
                    <li class="mb-3 flex justify-between items-center">
                        <span>{{ $usuario->name }}</span>
                        <div>
                            <button @click="editUser({{ $usuario->id }})" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                Editar
                            </button>
                            <button @click="deleteUser({{ $usuario->id }})" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                Borrar
                            </button>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '',
            eventClick: function(info) {
                alert('Evento: ' + info.event.title);
            }
        });
        calendar.render();
    });
</script>
<script>
    function editUser(userId) {
        // Aquí puedes redirigir a la página de edición o cargar el formulario de edición
        window.location.href = `/usuarios/${userId}/edit`;
    }

    function deleteUser(userId) {
        if (confirm('¿Estás seguro de que quieres borrar este usuario?')) {
            // Redirigir a la ruta de eliminación o hacer una llamada AJAX para eliminar
            window.location.href = `/usuarios/${userId}/delete`;
        }
    }
</script>
@endpush

@endsection