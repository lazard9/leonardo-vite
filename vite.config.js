import path from 'path';
import autoprefixer from 'autoprefixer';
import tailwindcss from 'tailwindcss';
import { defineConfig } from 'vite';
import browsersync from 'vite-plugin-browser-sync';
import { sourceMapsEnabled } from 'process';

// Define the root and base paths
const ROOT = path.resolve('../../../../');
const BASE = `/${__dirname.replace(ROOT, '')}`;

// Determine the current npm script
const currentScript = process.env.npm_lifecycle_event;
const isProduction = currentScript === 'prod';
const isBuild = currentScript === 'build';

export default defineConfig({
    base: (isProduction || isBuild) ? `${BASE}/dist/` : '/',
    server: {
        port: 8080, // Set the development server port to 8080
        hmr: {
            host: 'localhost',
        }
    },
    build: {
        // cssCodeSplit: isBuild ? true : false, // Disable CSS code splitting for faster HMR in development
        minify: isBuild ? false : true, // Disable minification in development
        outDir: 'dist', // Output directory
        manifest: true,
        assetsDir: '.', // Keep assets in the root of the dist folder
        emptyOutDir: true, // Clean output directory before each build
        sourcemap: isBuild ? true : false, // Enable sourcemaps
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'assets/js/main.js'),
                style: path.resolve(__dirname, 'assets/sass/style.scss'),
                tailwind: path.resolve(__dirname, 'assets/sass/tailwind.scss'),
                woocommerce: path.resolve(__dirname, 'assets/sass/woocommerce.scss'),
            },
            output: {
                entryFileNames: '[name].js',
                assetFileNames: '[name].[ext]',
            },
        },
    },
    css: {
        devSourcemap: true, // Enable source maps
        postcss: {
            plugins: [
                tailwindcss,
                autoprefixer,
            ],
        },
    },
    plugins: [
        browsersync({
            files: [
                "assets/**/*.{js,css,scss}",
                "./blocks/**/*.{php,js}",
                "./template-parts/**/*.php",
                "./*.php"
            ],
            proxy: "http://laravel-mix.test", // Use your local domain
            port: 3000, // Adjust the BrowserSync server port if necessary
            reload: true // Enable BrowserSync to reload the page when files change
        })
    ],
});
