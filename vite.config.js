import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/groupe_cours.js',
                'resources/js/bloc_cours.js',
                'resources/js/pagination.js',
                'resources/css/correction.css'
            ],
            refresh: true,
        }),
    ],
});
