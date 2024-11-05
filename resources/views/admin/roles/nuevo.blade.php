{{-- resources/views/admin/roles/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Crear Nuevo Rol')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card del formulario -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Cabecera -->
            <div class="bg-white px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">Crear Nuevo Rol</h2>
                    <a href="{{ route('admin.roles.index') }}"
                        class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver
                    </a>
                </div>
            </div>

            <!-- Formulario -->
            <form action="{{ route('admin.roles.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <!-- Nombre del rol -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Nombre del Rol
                    </label>
                    <div class="mt-1">
                        <input type="text"
                            name="name"
                            id="name"
                            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            value="{{ old('name') }}"
                            required>
                    </div>
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">
                        Slug
                    </label>
                    <div class="mt-1">
                        <input type="text"
                            name="slug"
                            id="slug"
                            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            value="{{ old('slug') }}"
                            required>
                    </div>
                    @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Descripción
                    </label>
                    <div class="mt-1">
                        <textarea name="description"
                            id="description"
                            rows="3"
                            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permisos -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Permisos
                    </label>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($permissions as $permission)
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->id }}"
                                        {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label class="font-medium text-gray-700">
                                        {{ $permission->name }}
                                    </label>
                                    <p class="text-gray-500">{{ $permission->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @error('permissions')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3 pt-6">
                    <a href="{{ route('admin.roles.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar Rol
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection