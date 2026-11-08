import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
            
                'resources/css/books/index.css',
                'resources/css/books/create.css',
                'resources/css/books/edit.css',
                'resources/css/books/show.css',

                'resources/css/members/index.css',
                'resources/css/members/create.css',
                'resources/css/members/edit.css',

                'resources/css/categories/index.css',
                'resources/css/categories/create.css',
                'resources/css/categories/edit.css',

                'resources/css/users/edit.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
