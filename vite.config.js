import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Ensure assets go into the 'public/build' directory
        manifest: true, // Ensure that manifest.json is generated
        rollupOptions: {
            input: {
                app: 'resources/js/app.js', // Entry point for JS
            },
        },
    },
});