<?php

namespace App\Providers;

use App\Models\Rubric;
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
    public function boot() {
        Schema::defaultStringLength(191);
        DB::listen ( function ( $query ) {

//            dump ($query->sql, $query->bindings); // Распечатаем наш запрос sql и привязки bindings
            /*dump ($query->sql);*/ // Распечатаем наш запрос sql

        }); // Listening For Query Events - Мы можем отслеживать SQL запросы и "привязки". На вход передаем коллбекфункцию параметром которой будет $query (те наш запрос)

// --->> View Composers (https://laravel.com/docs/8.x/views#view-composers). Для того, чтобы создавать блоки кода (похожие на виджеты, которые используют в различных фреймворках. Виджеты - это блоки кода, которые можно вставить компактно в нужное место в шаблоне. Задача виджета сделать так, чтобы мы не получали какие-то данные в каждом action, а получили их только один раз в виждете и этот виджет подключали много раз), которые мы будем вставлять в шаблоны разных страниц, но они везде одинаково будут отображаться. (Они отрабатывают тот момент, когда у нас уже есть работа с данными, но еще неотрендерин шаблон, те это специальный метод, который вызывается перед рендерингом вида. Если наш вид еще не отрендерин, то мы в него можем передать какие-то переменные. При этом, эти переменные будут переданы в тот вид, который мы укажем и они будут доступны в этом виде на любой странице сайта.
//  Для этого, мы в файле AppServiceProvider.php можем написать собственный вью композер в методе boot

        view ()->composer ('layouts.footer', function ($view) {
            $view->with('rubrics', Rubric::all());

        }); // Используя хелпер view мы вызываем composer и далее мы указываем, для какого именно вида мы будем передавать эти данные в шаблон 'layouts.footer', затем в коллбэк функции, в которой мы аргументом передаем $view и в теле функции мы передаем данные используя метод with. Мы указываем, как будет называться наша переменная ('rubrics') для шаблона и здесь же мы получаем ее значение Rubric::all. Если нам нужно передать эту переменную в несколько шаблонов, тогда первым аргументом мы указываем не строку с названием шаблона ('layouts.footer'), а массив с перечисленными шаблонами (['layouts.footer', 'layouts.___', 'layouts.___'])



    }
}
