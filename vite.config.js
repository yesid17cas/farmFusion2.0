import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/css/carrito.css',
                'resources/css/catalogo.css',
                'resources/css/datos.css',
                'resources/css/infoProduc.css',
                'resources/css/login.css',
                'resources/css/olvidoClv.css',
                'resources/css/perfil.css',
                'resources/css/tarjeta.css',
                'resources/js/script.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
