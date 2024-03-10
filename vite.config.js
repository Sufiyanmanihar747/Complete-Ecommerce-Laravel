import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/custom-script.js',
                'resources/css/custom-style.css',
            ],
            watch: [
                ['resources/js/custom-script.js'],
                ['resources/css/custom-style.css'],
            ],
            refresh: true,
        }),
    ],

    build: {
        outDir: 'public/assets',

        rollupOptions: {
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].css',
            },
        },
    },
});

