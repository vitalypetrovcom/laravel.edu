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
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ old ('title') }}">
                {{-- Даем имя данному полю name="title", чтобы мы на сервере смогли принять данные с этого поля. Старые значения, которые были записаны в форму они доступны через специальную функцию-хелпер old (аргументом мы указываем, какое именно поле мы хотим восстановить). Добавляя встроенную директиву в class="   @error('title') is-invalid @enderror  ", при возникновении ошибки в данном поле мы его выделяем красной подсветкой для наглядного отображения.  --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror {{-- Выводим сообщение об ошибке внизу под данным полем --}}
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5" name="content" placeholder="Content">{{ old ('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control @error('rubric_id') is-invalid @enderror" id="rubric_id" name="rubric_id"> {{-- Выведение выпадающего списка рубрик в цикле --}}
                    <option>Select rubric</option>
                    @foreach($rubrics as $k => $v)
                        <option value="{{ $k }}"
                        @if(old ('rubric_id') == $k) selected @endif{{-- Если у нас значение функции old по полю 'rubric_id' равно ключу $k, тогда мы добавим аттрибут selected --}}
                        >{{ $v }}</option>
                    @endforeach
                </select>

                @error('rubric_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>


@endsection

{{--@section('scripts')
    <script>
        alert(222);
    </script>
@endsection--}}
