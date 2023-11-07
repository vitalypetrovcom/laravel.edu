<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** @mixin Builder */

class Rubric extends Model
{

    /* ---------- Eloquent: Relationships - One To One -----------*/

    // $rubric = Rubric::find(1); // Достаем из таблицы rubric БД рубрику с id = 1
    // $rubric->post // Мы можем обратиться к виртуальному свойству post для получения поста, привязанного к рубрике путем $rubric->post. Таким образом метод назовем тоже post
    public function post () { // Метод для создания связи "Один к Одному" в модели Rubric - прямой связи - если мы захотим по названию рубрики получить название одного поста, который с ней связан

        // 1 вариант указания - в виде строки 'App\Models\Post'
        return $this->hasOne ('App\Models\Post');
        // 2 вариант указания - в виде ссылки Post::class
//        return $this->hasOne (Post::class);

    }

    /* ---------- Eloquent: Relationships - One To Many -----------*/

    public function posts () { // Метод для создания связи "Один ко Многим" в модели Rubric - прямой связи - если мы захотим по названию рубрики получить название нескольких постов, которые с ней связаны

        // 1 вариант указания - в виде строки 'App\Models\Post'
        return $this->hasMany ( 'App\Models\Post');

        // -->> Если, например, вместо названия по стандартам Ларавель rubric_id в таблице posts, мы назвали бы поле rubric_my_id? в этом случае для корректной работы кода, мы будем должны сделать возврат следующим образом, добавляя указание, что внешний ключ называется 'rubric_my_id':
        /*return $this->hasMany ( 'App\Models\Post', 'rubric_my_id');*/

    }

}
