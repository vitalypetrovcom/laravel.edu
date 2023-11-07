<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder // Используем примесь @mixin и подмешиваем сюда класс Builder - нам будут доступны в этой модели все методы
 */

class Post extends Model
{
    // Если мы создали модель и миграцию с определенным названием, привязанную к определенной таблице в БД, а потом решили изменить название таблицы в БД, нам нужно сообщить об этом Laravel:
//    protected $table = 'posts'; // Создаем защищенное свойство $table и присваиваем значение этому свойству в виде строки с названием нашей таблицы 'posts' (сейчас). Например, если мы переименуем нашу таблицу в 'my_posts' - тогда Laravel будет искать именно эту таблицу и связывать ее с данной моделью. Однако, в большинстве случаев, во избежанием ошибок, этого нужно избегать, те создавать модель с определенным названием и миграцию для создания таблицы в БД одновременно.

// -->> Модели Eloquent предполагают, что есть обязательно поле первичного ключа (PRIMARY), которое должно быть числовым и это поле должно называться "ID" c AUTO_INCREMENT. Если у нас иначе, те если в таблице в качестве первичного ключа используется поле с другим названием и типом данных (например, строки), нам нужно подсказать Laravel модели Eloquent как будет называться поле первичного ключа. Для этого существует специальное свойство:
//        protected $primaryKey = 'post_id'; // Указываем, что наше поле называется не ID, а, например, post_id
// Например, в нашем случае, для таблицы country поле с первичным ключом Code - называется не "ID", не является числовым, не является AUTO_INCREMENT. В этом случае данная ситуация решается следующим способом:
//        public $incrementing = false; // По умолчанию (true). False - означает, что поле не инкриментируемое (не AUTO_INCREMENT) - мы сами следим за его заполнением и сами должны гарантировать его уникальность
//        protected $keyType = 'string'; // Если у нас первичный ключ не число, а строка - в этом случае, мы должны сказать, что это строка 'string'. Таким образом, мы сообщаем Laravel, что мы сами будем следить за заполнением первичного ключа.

// -->> Модели Eloquent предполагают наличие в наших таблицах полей timestamps (created_at, updated_at). За актуальность данных в указанных полях в Eloquent будет следить сама модель и заполнять эти поля автоматически. Если мы не хотим, чтобы эти поля заполнялись автоматически тогда существует свойство:
//        public $timestamps = false; // Мы должны данное свойство выставить в false, в этом случае, Laravel не будет следить за заполнением этих полей

// Свойство $attributes - это массив, он нужен для того, чтобы Laravel что-то заполнял в нашей таблице автоматически
        protected $attributes = [
            'content' => 'Lorem ipsum...', // Чтобы в поле 'content' у нас записывалась строка 'Lorem ipsum'

        ];

        protected $fillable = ['title', 'content']; // "Белый список полей таблицы - разрешенные поля для массового присвоения". В файле HomeController.php - Для того, чтобы данный метод работал корректно, нам нужно добавить ключ 'title' в "белый список полей" (массив fillable), разрешенных для массового заполнения таким способом

//        protected $guarded = []; // "Черный список полей таблицы - запрещенные поля для массового присвоения". Если мы хотим разрешить все поля для массового заполнения - мы должны записать в свойство $guarded пустой массив []


    /* ---------- Eloquent: Relationships - One To One -----------*/


    public function rubric () { // Виртуальное свойство. В модели Post прописываем обратную связь, если по названию поста мы захотим получить его рубрику

        return $this->belongsTo (Rubric::class);

        // -->> Если, например, вместо названия по стандартам (конвенции) Ларавель rubric_id в таблице posts, мы назвали бы поле rubric_my_id? в этом случае для корректной работы кода, мы будем должны сделать возврат следующим образом, добавляя указание, что внешний ключ называется 'rubric_my_id':
        /*return $this->belongsTo (Rubric::class,'rubric_my_id');*/

    }


    /* ---------- Eloquent: Relationships - Many To Many (нам нужно связать уже не две таблицы, а нам нужно связать эти две таблицы посредством третьей (промежуточной) таблицы) -----------*/
    /* К одному посту можно присвоить много различных тегов, при этом, один и тот же тег может принадлежать к разным постам */

    // Получаем теги для постов
    public function tags () {

        return $this->belongsToMany (Tag::class); // Используем метод belongsToMany для модели "Многие ко многим" и передаем на вход Tag::class (мы связываем здесь модель Tag с моделью Post)

    }









}
