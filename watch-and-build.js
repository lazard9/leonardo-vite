import chokidar from 'chokidar';
import { exec } from 'child_process';
import browserSync from 'browser-sync';

const bs = browserSync.create();

// Pokrenite BrowserSync server
bs.init({
    proxy: "http://laravel-mix.test", // Use your local domain
    port: 3000,
    open: false,
});

// Funkcija za pokretanje izgradnje
const runBuild = () => {
    console.log('Building...');
    exec('npm run build', (err, stdout, stderr) => {
        if (err) {
            console.error(`Error during build: ${err.message}`);
            return;
        }
        if (stderr) {
            console.error(`Build stderr: ${stderr}`);
        }
        console.log(`Build stdout: ${stdout}`);
        bs.reload(); // Osvežite preglednik nakon build-a
    });
};

const watcher = chokidar.watch([
    "assets/**/*.{js,css,scss}",
    "./blocks/**/*.{php,js}",
    "./template-parts/**/*.php",
    "./*.php"
], {
    ignored: "./functions.php"
});

watcher.on('change', (path) => {
    console.log(`PHP File ${path} has been changed.`);
    runBuild();
});

// Početna poruka
console.log('Watching for file changes...');
