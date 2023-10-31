<?php

namespace App\Http\Controllers;

class HomeController extends Controller { // Контроллер (класс) для работы с главной страницей

    public function index () { // Метод для вывода на главную страницу

        return view ('home', ['res' => 5, 'name' => 'John']); // Подключаем шаблон для вывода вида

    }

    public function test () { //

       return __METHOD__;

    }
}
