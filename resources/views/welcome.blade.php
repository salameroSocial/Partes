<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestión de partes Somontano Social</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-image: url();
            /* Para evitar el desplazamiento de la página */
        }

        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* Coloca el canvas detrás del contenido */
        }

        .div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="antialiased">
    <canvas id="myCanvas"></canvas>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="foto image-container h-full"></div>
        <div class="flex justify-center items-center h-screen w-full">
            <div class="div text-center">
                <x-application-logo></x-application-logo>
                <br>
                <h1 class="text-4xl font-bold mb-4">Gestión de partes Somontano Social</h1>
                <p class="text-lg text-gray-700 mb-8">Identifícate para continuar.</p>
                <div>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Iniciar
                            Sesión</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="foto image-container h-full"></div>
    </div>

</body>

</html>
