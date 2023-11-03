<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder // Используем примесь @mixin и подмешиваем сюда класс Builder - нам будут доступны в этой модели все методы
 */

class City extends Model
{

    protected $table = 'city'; // Указываем для модели Ларавель существующее название таблицы

}
