<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get ( '/', function () {
    return '<h1> Hello, world! </h1>';
} );*/

/*Route::get ( '/', function () {
    $res = 2 + 3;
    $name = 'John';
    return view ('home')->with ('var', $res); // 1-й вариант передачи данных в шаблон: Используем метод with, чтобы передать наши данные: передаем переменную 'var' со значением переменной $res
} );*/

/*Route::get ( '/', function () {
    $res = 2 + 3;
    $name = 'John';
    return view ('home', ['res' => $res, 'name' => $name]); // 2-й вариант передачи данных в шаблон: Используем ассоциативный массив для передачи данных в формате ключ => значение
} );*/

Route::get ( '/', function () {
    $res = 2 + 3;
    $name = 'John';
    return view ('home', compact ('res', 'name')); // 3-й вариант передачи данных в шаблон: Используем нативную функцию PHP compact для передачи данных (мы передаем в эту функцию в виде строк названия переменных)
} );

Route::get ( '/about', function () { // Маршрутизация для страницы "about" сайта
    return view ('about');
} );
