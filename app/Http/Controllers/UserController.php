<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller { // Контроллер (класс) для работы с регистрацией и аутентификацией пользователей

    public function create () { // Метод для регистрации новых пользователей (форма для заполнения)

        return view ('user.create');

    }

    public function store (Request $request) { // Метод для сохранения новых пользователей в БД

        // Валидация полученных из формы данных
        $request->validate ([ // Массив валидационных правил и валидация данных
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        /*dd ($request->all ());*/ // Распечатаем полученные данные

        // Сохранение пользователя - будет возвращен объект созданного пользователя. Сохраняем ее в переменную $user (он нужен, чтобы мы могли сразу же авторизовать/аутентифицировать пользователя на сайте)
        $user = User::create([
            /*'name' => $request->input ('name'),*/ /* Предыдущий вариант записи значения */
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request->password), /* Хешируем пароль используя класс Facade\Hash и метод make */
        ]); // Используем модель User и метод create, в который передаем поля для сохранения в БД

// Если ошибок при валидации не возникло:

        // Сообщаем пользователю в виде флеш-сообщения, что он успешно зарегистрировался
        session ()->flash ('success', 'Successful registration!');

// Как проверить, авторизован пользователь на сайте или нет? Для этого мы можем использовать класс Facade\Auth в шаблоне layout.blade.php



        // Аутентификация пользователя. Для этого нам нужен класс Facade\Auth и метод login и передать ему объект пользователя. Как альтернативный вариант, мы можем не проводить сразу же аутентификацию пользователя, а после успешной регистрации перенаправить пользователя на форму авторизации на сайте.
        Auth::login ($user);

        /*return redirect ('/');
        return redirect ()->route ('home');*/
        return redirect ()->home (); // Используем метод home


    }

}
