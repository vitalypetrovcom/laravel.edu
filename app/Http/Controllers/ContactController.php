<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller { // Контроллер (класс) для отправки писем

    public function send (Request $request) { // Метод для отправки писем

        if ($request->method () == 'POST') { // Проверяем, каким именно методом произошел запрос используя объект $request и метод method (вернет строку с названием метода, которым произошло обращение)
            $body = "<p><b>Имя:</b> {$request->input ('name')} </p>";
            $body .= "<p><b>Email:</b> {$request->input ('email')} </p>";
            $body .= "<p><b>Сообщение:</b><br>" . nl2br($request->input ('text')) . "</p>";

            Mail::to('vitaly.petrov.com@gmail.com')->send (new TestMail($body)); // Для отправки письма нам нужен класс Facades\Mail, метод to и метод send. Здесь мы указываем email получателя письма. В методе send мы должны создать экземпляр нашего Mailable класса. В TestMail() мы можем передать дополнительные аргументы, который попадет в наш Mailable класс и тело письма (в конструктор) и мы сможем их использовать в представлении
            $request->session ()->flash ('success', 'Сообщение отправлено!');
            return redirect ('/send');
        }
        return view ('send');
    }

}
