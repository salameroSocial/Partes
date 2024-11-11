@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mx-auto">
    <div id="newUser"></div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-4">Lista de Usuarios</h1>

        <a href="{{ route('admin.usuarios.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg mb-2 hover:bg-blue-600">
            Crear Nuevo Usuario
        </a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nombre</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-center">Rol</th>
                <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($usuarios as $usuario)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $usuario->name }}</td>
                <td class="py-3 px-6 text-left">{{ $usuario->email }}</td>
                <td class="py-3 px-6 text-center">{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                <td class="py-3 px-6 text-center">
                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="text-yellow-500 hover:text-yellow-600">Editar</a>
                    <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 ml-4">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection