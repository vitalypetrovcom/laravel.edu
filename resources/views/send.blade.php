@extends('layouts.layout')

@section('title') @parent:: Send mail @endsection {{-- Конструкция {{ $title }} воспринимается как PHP код вида <?php echo $title ?>  --}}



@section('header')
    @parent {{-- Директива @parent дает нам возможность оставить контент секции @section('header') из шаблона layout.blade.php и, при необходимости, добавить дополнительный код (пишется после @parent) --}}
    {{--Свой контент--}}
@endsection

@section('content')

    <div class="container">

        <form method="post" action="/send">

            @csrf

            <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="text">Your message</label>
                <textarea class="form-control" id="text" rows="5" name="text"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>

        </form>

    </div>

@endsection
