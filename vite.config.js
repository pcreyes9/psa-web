import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['resources/views/**/*'],
        }),
        tailwindcss(),
    ],

    // ✔ Add this
    build: {
        outDir: 'public/build',
        manifest: true,
        emptyOutDir: true,
        rollupOptions: {
            input: 'resources/js/app.js',
        },
    },

    server: {
        cors: true,
    },
});
