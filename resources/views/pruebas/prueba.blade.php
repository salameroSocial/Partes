<x-app-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-10">Prueba de Roles</h1>

        @if (auth()->user()->hasRole('admin'))
            <p class="text-green-500">Tienes el rol de <strong>Admin</strong></p>
        @elseif (auth()->user()->hasRole('editor'))
            <p class="text-blue-500">Tienes el rol de <strong>Editor</strong></p>
        @else
            <p class="text-red-500">No tienes un rol especial asignado</p>
        @endif
    </div>

</x-app-layout>