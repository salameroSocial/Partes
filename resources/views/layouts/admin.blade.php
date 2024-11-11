<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js" defer></script>
    <!-- Esto es de chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @viteReactRefresh
    @vite('resources/js/app.js')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background-color: rgba(156, 163, 175, 0.5);
            border-radius: 2px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>

<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
        <!-- Sidebar para móvil -->
        <div x-show="sidebarOpen"
            x-cloak
            @click="sidebarOpen = false"
            class="fixed inset-0 z-20 transition-opacity bg-gray-500 bg-opacity-50 lg:hidden"></div>

        <!-- Sidebar -->
        <aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
            class="fixed inset-y-0 left-0 z-30 w-64 transform transition duration-300 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex flex-col h-full bg-gray-800">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 bg-gray-900">
                    <span class="text-white text-xl font-semibold">Panel Admin</span>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto sidebar-nav">
                    <x-admin-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-admin-link>
                    <x-admin-link :href="route('admin.usuarios.index')" :active="request()->routeIs('admin.usuarios.index')">
                        {{ __('Usuarios') }}
                    </x-admin-link>
                    <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')">
                        {{ __('Roles') }}
                    </x-admin-link>
                    <x-admin-link :href="route('fields.index')" :active="request()->routeIs('fields.index')">
                        {{ __('Campos del form') }}
                    </x-admin-link>
                    <x-admin-link :href="route('admin.charts')" :active="request()->routeIs('admin.charts')">
                        {{ __('Grafikos') }}
                    </x-admin-link>



                </nav>

                <!-- Botón de volver al inicio -->
                <div class="p-4">
                    <a href="{{ url('/') }}" class="flex items-center px-4 py-3 text-gray-100 rounded-lg hover:bg-gray-700 transition duration-300 group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l7 7-7 7" />
                        </svg>
                        <span>Volver al Inicio</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top header -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="flex items-center">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <div id="app"></div>
    <script src="{{ mix('js/app.jsx') }}"></script>
    @stack('scripts')
</body>

</html>