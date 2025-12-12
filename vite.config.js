import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],

    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        // ❌ DO NOT add: manifest: true
        // ❌ DO NOT add: rollupOptions
    },

    server: {
        cors: true,
    },
});
