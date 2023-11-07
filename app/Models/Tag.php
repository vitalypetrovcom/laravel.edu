<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model // Модель для получения связанных постов
{
    /* ---------- Eloquent: Relationships - Many To Many (нам нужно связать уже не две таблицы, а нам нужно связать эти две таблицы посредством третьей (промежуточной) таблицы) -----------*/
    /* К одному посту можно присвоить много различных тегов, при этом, один и тот же тег может принадлежать к разным постам */

    // Получаем посты для тегов
    public function posts () { // Метод для установления связи между постами и тегами


        return $this->belongsToMany (Post::class); // Используем метод belongsToMany для модели "Многие ко многим" и передаем на вход Post::class (мы связываем здесь модель Post с моделью Tag)

    }

}
