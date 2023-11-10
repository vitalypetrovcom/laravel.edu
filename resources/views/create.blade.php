@extends('layouts.layout')

@section('title') @parent:: {{ $title }} @endsection {{-- Конструкция {{ $title }} воспринимается как PHP код вида <?php echo $title ?>  --}}



@section('header')
    @parent {{-- Директива @parent дает нам возможность оставить контент секции @section('header') из шаблона layout.blade.php и, при необходимости, добавить дополнительный код (пишется после @parent) --}}
    {{--Свой контент--}}
@endsection

@section('content')

    <div class="container">

        <form class="mt-5" method="post" action="{{ route('posts.store') }}"> {{-- после отправки данные идут по маршруту {{ route('posts.store') }} --}}

            @csrf {{-- Шифрование данных --}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old ('title') }}"> {{-- Даем имя данному полю name="title", чтобы мы на сервере смогли принять данные с этого поля. Старые значения, которые были записаны в форму они доступны через специальную функцию-хелпер old (аргументом мы указываем, какое именно поле мы хотим восстановить) --}}
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="5" name="content" placeholder="Content">{{ old ('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control" id="rubric_id" name="rubric_id"> {{-- Выведение выпадающего списка рубрик в цикле --}}
                    <option>Select rubric</option>
                    @foreach($rubrics as $k => $v)
                        <option value="{{ $k }}"
                        @if(old ('rubric_id') == $k) selected @endif{{-- Если у нас значение функции old по полю 'rubric_id' равно ключу $k, тогда мы добавим аттрибут selected --}}
                        >{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>


@endsection
