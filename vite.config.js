import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
//import Vue from 'vue'
import * as MicroModal from 'micromodal'

export default defineConfig({
    // WSL2でvite開発サーバへアクセスするために必須
    /*
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    */
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
            // WSL2でvite開発サーバへアクセスするために必須
            /*
            serve: {
                host: true,
                hmr: {
                    host: 'localhost',
                },
            },
            */
        }),
        //Vue.use(MicroModal)
    ],
});
