@extends('layouts.layout')

@section('title') @parent:: Login @endsection {{-- Конструкция {{ $title }} воспринимается как PHP код вида <?php echo $title ?>  --}}



@section('header')
    @parent {{-- Директива @parent дает нам возможность оставить контент секции @section('header') из шаблона layout.blade.php и, при необходимости, добавить дополнительный код (пишется после @parent) --}}
    {{--Свой контент--}}
@endsection

@section('content')

    <div class="container">

        <form method="post" action="{{ route ('login') }}">

            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>


            <button type="submit" class="btn btn-primary">Send</button>

        </form>

    </div>

@endsection
