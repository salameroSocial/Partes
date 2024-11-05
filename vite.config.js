import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'], // Verifica que estés usando el archivo correcto
            refresh: true,
        }),
        react(), // Este plugin asegura que Vite maneje JSX
    ],
});
