<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="{{ route ('posts.update', ['slug' => $id]) }}" method="post"> {{-- Отредактированные данные должны быть отправлены на метод "update", поэтому здесь мы указываем маршрут route ('posts.update') --}}
    @csrf {{-- Подключаем токен для шифрования данных --}}
    @method('PUT') {{-- Переопределяем метод передачи данных --}}
    <input type="text" name="title">
    <button type="submit">Submit</button>
</form>



</body>
</html>
