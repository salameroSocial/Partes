<x-guest-layout>
    <style>
        .form_input {
            border-color: #CBD5E0;
        }

        .form_input:focus {
            border-color: #4F46E5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .form_label {
            font-weight: 600;
        }

        .error_message {
            color: #DC2626;
        }
    </style>

    <form method="POST" action="{{ route('register') }}" class="max-w-lg mx-auto py-8 px-4 shadow-lg rounded-lg">
        @csrf

        <!-- Nombre -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nombre')" class="form_label" />
            <x-text-input id="name" class="block mt-1 w-full border rounded-md form_input shadow-sm" type="text"
                name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 error_message" />
        </div>

        <!-- Correo electrónico -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Correo electrónico')" class="form_label" />
            <x-text-input id="email" class="block mt-1 w-full border rounded-md form_input shadow-sm" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error_message" />
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Contraseña')" class="form_label" />
            <x-text-input id="password" class="block mt-1 w-full border rounded-md form_input shadow-sm"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error_message" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="form_label" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border rounded-md form_input shadow-sm"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error_message" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-indigo-600 hover:text-indigo-900 transition-colors duration-200"
                href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
