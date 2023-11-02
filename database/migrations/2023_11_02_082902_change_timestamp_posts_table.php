<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTimestampPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement ("ALTER TABLE `posts` CHANGE `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP"); // Для внесения изменений в поля created_at / updated_at таблицы 'posts', мы используем метод Facades\DB и метод statement, в котором мы должны прописать SQL запрос на внесение изменений в указанные поля
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
            \Illuminate\Support\Facades\DB::statement ("ALTER TABLE `posts` CHANGE `created_at` `created_at` TIMESTAMP NULL, CHANGE `updated_at` `updated_at` TIMESTAMP NULL");
        });
    }
}
