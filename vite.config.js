import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/css/swiper-bundle.min.css','resources/js/main.js','resources/js/swiper-bundle.min.js'],
            refresh: true,
        }),
    ],
});
