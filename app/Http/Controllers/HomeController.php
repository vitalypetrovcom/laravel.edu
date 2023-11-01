<?php

namespace App\Http\Controllers;

class HomeController extends Controller { // Контроллер (класс) для работы с главной страницей

    public function index () { // Метод для вывода на главную страницу

        dump (config ('app.timezone')); // config - это функция хелпер, она так же может вернуть значение или она может его установить function config($key = null, $default = null)
        dump (config ('database.connections.mysql.database')); // Если нам нужно вывести значение переменной, которая находится в файле в многомерном массиве, тогда мы указываем полный путь к переменной, начиная с названия файла, перечислением ключей массива до нужного ключа, отделяя каждый новый ключ точкой. 'database' => env('DB_DATABASE', 'forge') - означает, что если в настройках окружения переменной не указана настройка 'DB_DATABASE' (нет такой записи), тогда ключу 'database' будет присвоено значение 'forge'

        dump ($_ENV); // Распечатка настроек глобальной переменной $_ENV
        dump ($_ENV['DB_CONNECTION']); // Распечатка значения конкретной переменной 'DB_CONNECTION' из глобального массива $_ENV

        return view ('home', ['res' => 5, 'name' => 'John']); // Подключаем шаблон для вывода вида

    }

    public function test () { //

       return __METHOD__;

    }
}
