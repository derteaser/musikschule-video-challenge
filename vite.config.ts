import { defineConfig } from 'vite'
import laravel from 'vite-plugin-laravel'
import mkCert from'vite-plugin-mkcert'

export default defineConfig({
    plugins: [
        laravel(),
        mkCert()
    ],
    server: {
        https: true
    },
})
