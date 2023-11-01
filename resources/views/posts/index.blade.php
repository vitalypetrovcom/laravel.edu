<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>Список постов</h1>

<ul>
    {{--<li>
        <a href="{{ route ('posts.show', ['post' => 1]) }}">Post 1</a> | --}}{{-- в href указываем маршрут к нашему посту 1  --}}{{--
        <a href="{{ route ('posts.edit', ['post' => 1]) }}">Edit</a> | --}}{{-- Указываем ссылку (маршрут) на редактирование поста 1 --}}{{--
        --}}{{-- Нам потребуется форма для использования метода DELETE для удаления поста --}}{{--
        <form action="{{ route ('posts.destroy', ['post' => 1]) }}" method="post">
            @csrf
            @method('DELETE') --}}{{-- Переопределяем метод передачи данных --}}{{--
            <button type="submit">Delete</button>
        </form>
    </li>--}}

    <li>
        <a href="{{ route ('posts.show', ['slug' => 1]) }}">Post 1</a> | {{-- в href указываем маршрут к нашему посту 1, дополнительным парметром передаем 'slug' (после замены 'post' на 'slug')  --}}
        <a href="{{ route ('posts.edit', ['slug' => 1]) }}">Edit</a> | {{-- Указываем ссылку (маршрут) на редактирование поста 1 --}}
        {{-- Нам потребуется форма для использования метода DELETE для удаления поста --}}
        <form action="{{ route ('posts.destroy', ['slug' => 1]) }}" method="post">
            @csrf
            @method('DELETE') {{-- Переопределяем метод передачи данных --}}
            <button type="submit">Delete</button>
        </form>
    </li>

    <li>
        <a href="{{ route ('posts.show', ['slug' => 2]) }}">Post 2</a> |
        <a href="{{ route ('posts.edit', ['slug' => 2]) }}">Edit</a> | {{-- Указываем ссылку (маршрут) на редактирование поста 2 --}}
        <form action="{{ route ('posts.destroy', ['slug' => 2]) }}" method="post">
            @csrf
            @method('DELETE') {{-- Переопределяем метод передачи данных --}}
            <button type="submit">Delete</button>
        </form>

    </li>

    <li>
        <a href="{{ route ('posts.show', ['slug' => 3]) }}">Post 3</a> |
        <a href="{{ route ('posts.edit', ['slug' => 3]) }}">Edit</a> | {{-- Указываем ссылку (маршрут) на редактирование поста 3 --}}
        <form action="{{ route ('posts.destroy', ['slug' => 3]) }}" method="post">
            @csrf
            @method('DELETE') {{-- Переопределяем метод передачи данных --}}
            <button type="submit">Delete</button>
        </form>

    </li>

</ul>


</body>
</html>
