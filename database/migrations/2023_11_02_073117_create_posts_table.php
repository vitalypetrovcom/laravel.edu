<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Функция up создает таблицу со всеми требуемыми для нас полями
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('title'); // Для создания поля 'title', используем метод string и передаем ему названия поля, которое мы хотим создать. По-умолчанию, VARCHAR (255). Можем вторым аргументом передать требуемую длину строки
            $table->text ('content'); // Для создания поля 'content', используем метод text и передаем ему названия поля, которое мы хотим создать. Большое поле типа text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  // Функция down откатывает таблицу к предыдущему состоянию
    {
        Schema::dropIfExists('posts');
    }
}
