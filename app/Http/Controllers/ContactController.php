<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller { // Контроллер (класс) для отправки писем

    public function send () { // Метод для отправки писем

        Mail::to('vitaly.petrov.com@gmail.com')->send (new TestMail()); // Для отправки письма нам нужен класс Facades\Mail, метод to и метод send. Здесь мы указываем email получателя письма. В методе send мы должны создать экземпляр нашего Mailable класса. В TestMail() мы можем передать дополнительные аргументы, который попадет в наш Mailable класс и тело письма (в конструктор) и мы сможем их использовать в представлении
        return view ('send');
    }

}
