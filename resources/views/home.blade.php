@extends('layouts.layout')

@section('title') @parent:: {{ $title }} @endsection {{-- Конструкция {{ $title }} воспринимается как PHP код вида <?php echo $title ?>  --}}



@section('header')
    @parent {{-- Директива @parent дает нам возможность оставить контент секции @section('header') из шаблона layout.blade.php и, при необходимости, добавить дополнительный код (пишется после @parent) --}}
    {{--Свой контент--}}
@endsection

@section('content')
    <section class="jumbotron text-center">
        <div class="container">

            {{-- {{ $h1 }} --}}{{-- При выводе переменных таким способом шаблонизатор blade пропускает html код через функцию htmlspecialcharts с целью обезопасить наш сайт от XSS-атак --}}

            {{--{!! $h1 !!}--}} {{-- Если мы уверены, что это безопасный вывод данной переменной $h1, мы отменяем пропуск нашего выводимого кода через функцию htmlspecialcharts: мы используем одинарные кавычки и по 2!! знака с каждой стороны от выводимого выражения - {!! $h1 !!} --}}

            {{-- {!! mb_strtoupper ($h1) !!}--}} {{-- Так же, в фигурных скобках мы можем использовать различные PHP функции для переменных --}}

            {{--@{{ title }}--}}  {{-- Если мы хотим дать указание шаблонизатору blade не обрабатывать какой-либо код (например, данный код предназначается для обработки JS фреймворком а не PHP), в таком случае, мы перед двойными кавычками ставим @: @{{ title }} --}}

            {{-- $title --}} {{-- Допустим, мы хотим временно закомментировать вывод данной переменной. В таком случае, мы в двойных скобках с обеих сторон переменной ставим по 2 --: (-- $title --) --}}

            {{--@verbatim
                <div class="container">
                    Hello, {{ name }}.
                </div>
            @endverbatim--}} {{-- Если мы хотим чтобы шаблонизатор blade исключил из обработки целый кусок кода (например, для его обработки JS фреймфорком), тогда мы используем директиву @verbatim в перед и после такого кода --}}

            {{-- !! Когда мы используем директиву @include, то все переменные, которые доступны родительскому шаблону будут так же доступны шаблону, в который мы подключили родительский шаблон. Например, когда мы включаем в шаблон layout.blade.php шаблон футера @include('layouts.footer'), тогда в шаблоне layout.blade будут доступны для использования все переменные шаблона footer.blade.php --}}

            {{------------------- Использование управляющих конструкций ----------------}}

            {{--@if(count ($data1) > 20)
                Count > 20
            @elseif(count ($data1) < 20)
                Count < 20
            @else
                Count = 20
            @endif--}}

            {{--@isset($data2)
                Isset data 2
            @endisset--}}

            {{-- Директива @production позволяет проверить среду разработки (production - готовый сайт, который выложен на сервер, local - сайт в состоянии разработки (файл .env) --}}
            {{--@production
                <h1>PRODUCTION</h1>
            @endproduction--}}

            {{-- Директива @env позволяет проверить какую-либо переменную окружения (например, параметр APP_ENV в файле .env равен ли он local) --}}
            {{--@env('local')
                <h1>LOCAL</h1>
            @endenv--}}

            {{------------------- Использование циклов ----------------}}

            {{--@for($i = 0; $i < count ($data1); $i++)
                @if($data1[$i] % 2 != 0)
                    @continue
                @elseif($data1[$i] == 6 || $data1[$i] == 8)
                    @continue
                @elseif($data1[$i] == 16)
                    @break
                @endif
                {{ $data1[$i] }}
            @endfor--}}

            {{--@foreach($data2 as $k => $v)
                {{ $k }} => {{ $v }} <br>
            @endforeach--}}



            {{------------------- Использование динамического контента из БД -------------------}}
            <h1>{{ $title }}</h1>



        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>
                                    {{ $post->title }}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <h5>{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">
                                        {{--{{ $post->created_at }}--}}
                                        {{--{{ \Carbon\Carbon::createFromFormat ('Y-m-d H:i:s', $post->created_at)->format ('d.m.Y') }}--}} {{-- Если мы хотим вывести дату создания поста в более привычной для нас форме, тогда мы используем дополнение к Ларавель Carbon, метод createFromFormat, первым аргументом передаем текущий формат даты и времени, вторым аргументом передаем саму дату и время из БД. Затем, используя метод format указываем нужный нам формат вывода даты и времени --}}
                                        {{ $post->getPostDate () }} {{-- Получаем дату создания в человеческом формате используя объект $post и метод getPostDate --}}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                    <div class="col-md-12">
                        {{--{{ $posts->appends (['test' => request ()->test])->fragment ('foo')->links () }}--}}
                        {{ $posts->onEachSide(2)->links ('vendor.pagination.my_pagination') }} {{-- Мы можем выбрать любой дефолтный или создать и использовать свой шаблон пагинации из папки resources/views/vendor/pagination --}}

                        {{-- Для того, чтобы при использовании пагинации на странице мы не потеряли GET параметры в запросе пользователя, используем метод appends. Передаем требуемые параметры в виде массива. Если нам нужно для каких-либо целей (якоря, ссылки в контенте итд.) добавить в строку запроса дополнительные параметры, мы можем это сделать методом fragment с указанием этого параметра (fragment ('foo')). Если мы хотим показывать в пагинации какое количество ссылок слева и справа от активной (этот параметр работает при большом количестве записей) используем метод onEachSide с указанием количества ссылкок с каждой стороны onEachSide(1) --}}
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        /*alert(111);*/
    </script>
@endsection
