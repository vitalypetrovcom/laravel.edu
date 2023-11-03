<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        DB::listen ( function ( $query ) {

//            dump ($query->sql, $query->bindings); // Распечатаем наш запрос sql и привязки bindings
            dump ($query->sql); // Распечатаем наш запрос sql

        }); // Listening For Query Events - Мы можем отслеживать SQL запросы и "привязки". На вход передаем коллбекфункцию параметром которой будет $query (те наш запрос)
    }
}
