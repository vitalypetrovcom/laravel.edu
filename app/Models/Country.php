<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder // Используем примесь @mixin и подмешиваем сюда класс Builder - нам будут доступны в этой модели все методы
 */

class Country extends Model
{

    protected $table = 'country'; // Указываем для модели Ларавель существующее название таблицы
    protected $primaryKey = 'Code'; // Первичный ключ поле 'Code'
    public $incrementing = false; // Первичный ключ не AUTO_INCREMENT
    protected $keyType = 'string'; // Первичный ключ строка

}
