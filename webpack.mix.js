const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/* Объединяем файлы bootstrap.css и main.css в один файл стилей styles.css и переносим его в 'public/css/styles.css' */
mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css'
], 'public/css/styles.css');

/* Объединяем файлы jquery-3.5.1.slim.js и bootstrap.js в один файл скриптов scripts.js и переносим его в 'public/js/scripts.js' */ /* jquery должен стоять первым, тк он влияет на загрузку и работу других скриптов */
mix.scripts([
    'resources/front/js/jquery-3.5.1.slim.js',
    'resources/front/js/bootstrap.js'
], 'public/js/scripts.js');

/* Переносим файлы картинок из папки 'resources/front/img' в папку 'public/img'. Для этого используем метод mix.copyDirectory */
mix.copyDirectory('resources/front/img', 'public/img');

/*
// Run all Mix tasks...

npm run dev - Собирает файлы для разработки (она их просто собирает без всякого сжатия помещает по нужному адресу

// Run all Mix tasks and minify output...

npm run prod - Собирает файлы для продакшена (она не просто запускает все задачи, но и еще минифицирует вывод - она сжимает файлы(убирает все пробелы, отступы, переносы строк, все то, что нам так нужно чтобы было удобно править файлы))
*/


/*
BrowserSync can automatically monitor your files for changes, and inject your changes into the browser without requiring a manual refresh. You may enable support for this by calling the mix.browserSync() method: (https://laravel.com/docs/8.x/mix#browsersync-reloading)
*/
mix.browserSync('laravel.edu');







