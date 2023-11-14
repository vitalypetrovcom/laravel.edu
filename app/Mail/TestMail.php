<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable { // Mailable класс для работы с почтой (один тип сообщений. Типов сообщений может быть несколько под разные задачи. Для каждого типа создается свой отдельный Mailable класс
    use Queueable, SerializesModels;

    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body) // Конструктор нужен для того, чтобы при создании экземпляра данного класса для отправки письма мы могли в данный конструктор что-то передать (переменную, данные итд., которые мы будем использовать в представлении). Передаем на вход переменную $body
    {

        $this->body = $body;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() // Указывается вид, который нам нужно подключить (оно будет находиться в resources/views)
    {
        return $this->view('test2')->attach (url ('img/1.jpg')); // Чтобы прикрепить какой-либо файл к письму используется метод attach (мы должны указать путь к файлу - для этого, мы используем хелпер url)
    }
}
