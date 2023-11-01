<?php
/* Контроллеры ресурсов нужны прежде всего для при работе (создание контроллеров) с админ-панелью и api сервисами для выполнения типичных функций создания, чтения, обновления и удаления данных (ресурса) («CRUD») */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct (Request $request) { // Создаем метод для внедрения зависимости Request $request, чтобы узнать название маршрута

        dump ($request->route ()->getName ()); // Название маршрута будет показываться при обращении к данному ресурсу

    }


    /**
     * Display a listing of the resource.
    */
    public function index() // Метод для отображения данных (ресурса)(списка постов)
    {
        return view ('posts.index'); // Выводим в вид
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Метод для отправки формы с данными (создание нового ресурса). Должен показать пустую форму для заполнения данными
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Метод для принятия и сохранения данных (ресурса)
    {
        dd ($request); // Покажем данные с помощью функции dd(dump and die)
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // Метод для показа (просмотра) данных (отдельного ресурса) по его id | slug
    {
        return "Post $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) // Метод для изменения (редактирования) данных (отдельного ресурса) по его id | slug. Должен показывать заполненную существующими данными форму для изменения (редактирования) данных (отдельного ресурса). Мы можем изменить данные и заново их сохранить и они тогда уйдут на следующий метод "update"
    {
        return view ('posts.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // Метод для обновления(перезаписи) данных (отдельного ресурса) по его id | slug. На вход передаем внедрение зависимости Request $request и $id данных (ресурса)
    {
        dump ($id); // Распечатаем id
        dd ($request); // Распечатаем $request
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // Метод для удаления данных (отдельного ресурса) по его id | slug. На вход передаем $id данных (ресурса)
    {
        dump (__METHOD__);
        dd ($id);
    }
}
