<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string ('title', 100)->change (); // Для того, чтобы произвести изменения в существующей таблице 'posts' (после того, как мы создали миграцию 2023_11_02_081043_change_posts_table.php для изменения записей данной таблицы, мы выбираем поле для изменения, вносим изменения и применяем метод "change" для внесения изменений
            $table->text ('content')->nullable (true)->change ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) { // Для отката данной миграции, мы здесь указываем эти поля и должны вернуть их к предыдущему состоянию
            $table->string ('title')->change ();
            $table->text ('content')->nullable (false)->change ();
        });
    }
}
