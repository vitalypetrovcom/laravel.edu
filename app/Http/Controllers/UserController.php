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
            'avatar' => 'nullable|image',
        ]);

        /*dd ($request->all ());*/ // Распечатаем полученные данные

        // Проверяем, есть ли картинка в отправленной форме
        if ($request->hasFile ('avatar')) { // Если картинка есть, тогда мы с ней работаем
            $folder = date ('Y-m-d'); // Создаем папку с текущей датой в папке images/
            // Для сохранения картинки, мы обращаемся к объекту $request, метод file и метод store (сохраняет картинку под случайно сгенерированным названием в папку 'images'). Вторым аргументом store мы можем опционально передать дополнение 'public' к маршруту пути сохранения, тогда путь будет storage/app/public/images
            $avatar = $request->file ('avatar')->store ("images/{$folder}");
        }
// Для того, чтобы получить доступ к закрытой для внешних пользователей папке storage/app/public/images, в Ларавель используются символические ссылки (https://laravel.com/docs/8.x/filesystem#the-public-disk). Диск public, определенный в файле конфигурации filesystems вашего приложения, предназначен для файлов, которые будут общедоступными. По умолчанию публичный диск использует драйвер local и хранит свои файлы в storage/app/public. Чтобы сделать эти файлы доступными из интернета, вы должны создать символическую ссылку на storage/app/public в public/storage. Использование этого соглашения о папках позволит хранить ваши публичные файлы в одном каталоге, который может быть легко доступен


        /*$avatar = $request->file ('avatar')->store ('images', 'public')*/ // Для примера.


        // Сохранение пользователя в БД - будет возвращен объект созданного пользователя. Сохраняем ее в переменную $user (он нужен, чтобы мы могли сразу же авторизовать/аутентифицировать пользователя на сайте)
        $user = User::create([
            /*'name' => $request->input ('name'),*/ /* Предыдущий вариант записи значения */
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request->password), /* Хешируем пароль используя класс Facade\Hash и метод make */
            'avatar' => $avatar ?? null, // Аналог записи тернарного оператора $avatar ? $avatar : null

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

    public function loginForm () { // Метод для показа формы авторизации

        return view ('user.login');

    }

    public function login (Request $request) { // Метод для отправки данных методом POST из формы авторизации. Внедряем объект $request

        // Валидация полученных из формы данных
        $request->validate ([ // Массив валидационных правил и валидация данных
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Аутентификация пользователя. Для этого мы используем класс Auth и метод attempt (bool: true|false)
        if (Auth::attempt ([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            // Редирект на главную страницу
            return redirect ()->home ();
        }

        // ИЛИ Редирект на страницу авторизации
        /*return redirect ()->route ('login.create');*/
        return redirect ()->back ()->with ('error', 'Incorrect login or password!'); /* Аналогичный вариант: метод back вернет пользователя на страницу авторизации (откуда он пришел). Можно показать ошибки с помощью метода with (flash сообщения) */

    }

    public function logout () { // Метод для выхода пользователя из сессии (logout)

        Auth::logout ();
        return redirect()->route ('login.create');

    }








}
