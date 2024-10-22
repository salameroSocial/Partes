<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Tw --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-500">
    <style>
        .menu {
            background-color: #fff;
        }
    </style>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-200 border-solid dark:bg-gray-900">
        {{-- Settings Dropdown --}}
        <div class="max-w-screen flex flex-wrap flex-row-reverse items-center justify-between mx-auto p-4">
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            {{-- Hamburguer --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="absolute left-1/2 transform -translate-x-1/2" name="content">
                <x-application-logo class="" />
            </div>
            <div class="items-center pl-4 justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">

                <ul class="menu flex flex-col text-white font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class="text-black-500">
                        <x-nav-link-dos :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Inicio') }}
                        </x-nav-link-dos>
                    </li>
                    <li class="text-black-500">
                        <x-nav-link-dos :href="route('partes.index')" :active="request()->routeIs('partes.index')">
                            {{ __('Partes') }}
                        </x-nav-link-dos>
                    </li>
                    <li class="text-black-500">
                        <x-nav-link-dos :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                            {{ __('Clientes') }}
                        </x-nav-link-dos>
                    </li>
                    <li class="text-black-500">
                        <x-nav-link-dos :href="route('empleados.index')" :active="request()->routeIs('empleados.index')">
                            {{ __('Empleados') }}
                        </x-nav-link-dos>
                    </li>
                    <li class="text-black-500">
                        <x-nav-link-dos :href="route('prueba.exportarHoja')" :active="request()->routeIs('prueba.exportarHoja')">
                            {{ __('Descargar Partes') }}
                        </x-nav-link-dos>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Responsive Navigation menu --}}
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('partes.index')" :active="request()->routeIs('partes.index')">
                        {{ __('Partes') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                        {{ __('Clientes') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('empleados.index')" :active="request()->routeIs('empleados.index')">
                        {{ __('Empleados') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('prueba.exportarHoja')" :active="request()->routeIs('prueba.exportarHoja')">
                        {{ __('Descargar Partes') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>