<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@section('title')My Site @show</title>

    {{--<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">--}}

    <!-- Custom styles for this template -->
    {{--<link href="/css/styles.css" rel="stylesheet">--}}

    <link href="{{ asset ('css/styles.css') }}" rel="stylesheet"> {{-- Для подключения файла стилей Ларавель предлагает нам специальную функцию-хелпер asset, который уже указывает на корневую папку pulic/, и в ней мы указываем путь к нужному нам файлу asset ('css/styles.css') --}}

</head>
<body>

<header>
    @section('header')
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        <li><a href="{{ route('page.about') }}" class="text-white">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Album</strong>
            </a>

    {{-- // 1 Вариант - Как показать по условию (аутентификация пользователя) ссылки в шапке сайта --}}
            {{--@if(auth ()->check ())
                --}}{{-- Пользователь авторизован --}}{{--
                <a href="#">{{ auth ()->user ()->name }}</a> --}}{{-- Получить имя пользоваетля мы можем используя класс auth и метод user выбирая только параметр name --}}{{--
                <a href="{{ route ('logout') }}">Logout</a> --}}{{-- Ссылка на выход из сессии --}}{{--
            @else
                --}}{{-- Пользователь НЕавторизован --}}{{--
                <a href="{{ route ('register.create') }}">Регистрация</a> --}}{{-- Ссылка на страницу формы регистрации --}}{{--
                <a href="{{ route ('login.create') }}">Login</a> --}}{{-- Ссылка на страницу формы авторизации --}}{{--
            @endif--}}

    {{-- // 2 Вариант - Как показать по условию (аутентификация пользователя) ссылки в шапке сайта. Для этого используем blade директивы @auth (если пользователь авторизован) и @guest (если пользователь НЕ авторизован) (https://laravel.com/docs/8.x/blade) --}}
            @auth()
                <a href="#">
                    {{ auth ()->user ()->name }}
                    @if (auth ()->user ()->avatar) {{-- Выводим аватарку рядом с юзером --}}
                        <img src="{{ asset ('storage/' . auth ()->user ()->avatar) }}" alt="" height="20px"> {{-- функция asset создает путь к нужному нам файлу --}}
                    @endif
                </a> --}}{{-- Получить имя пользоваетля мы можем используя класс auth и метод user выбирая только параметр name --}}

                <a href="{{ route ('logout') }}">Logout</a> --}}{{-- Ссылка на выход из сессии --}}
            @endauth

            @guest()
                <a href="{{ route ('register.create') }}">Регистрация</a> --}}{{-- Ссылка на страницу формы регистрации --}}
                <a href="{{ route ('login.create') }}">Login</a> --}}{{-- Ссылка на страницу формы авторизации --}}
            @endguest


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    @show {{-- Директива @show закрывает секцию и показывает секцию (в нашем случае @section('header')) --}}
</header>

<main role="main">

    <div class="container">
        @include('layouts.alerts')
    </div>


    @yield('content')

</main>

@include('layouts.footer') {{-- Директива @include позволяет подключать нужный нам шаблон blade (@include('layouts.footer')) там, где это нам нужно --}}

{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>--}}

{{-- Для подключения файла скриптов Ларавель предлагает нам специальную функцию-хелпер asset, который уже указывает на корневую папку pulic/, и в ней мы указываем путь к нужному нам файлу asset ('js/scripts.js') --}}
<script src="{{ asset ('js/scripts.js') }}"></script>


{{-- Как подключать в одном шаблоне скрипты таким образом, чтобы разные скрипты срабатывали при выводе разных страниц? Это можно сделать с помощью секции. Указываем в общем шаблоне вставку секции @yield('scripts'), а в шаблонах на каждой конкретной странице секцию @section('scripts') с вставкой кода скрипта (например, <script> alert(111); </script>) --}}
@yield('scripts')

</body>
</html>

