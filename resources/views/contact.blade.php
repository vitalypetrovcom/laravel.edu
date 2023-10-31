<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>
<body>


{{--<form action="send-email" method="post">
    --}}{{-- csrf_field () --}}{{-- --}}{{-- отправка токена безопасности вместе с формой функцией csrf_field на страницу action="send-email"--}}{{--
    @csrf --}}{{-- альтернативный вариант предыдущему --}}{{--
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Submit</button>
</form>--}}

{{-- 2 --}}
{{--<form action="" method="post">
     --}}{{--csrf_field ()   отправка токена безопасности вместе с формой функцией csrf_field --}}{{--
    {{ method_field ('PUT') }}
    @csrf  --}}{{--альтернативный вариант предыдущему--}}{{--
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Submit</button>
</form>--}}

{{-- 3 --}}
{{--<form action="{{ route ('contact') }}" method="post">  --}}{{--мы в action прописываем специальную функцию хелпер, которая называется "route" и передаем в нее аргументом имя маршрута --}}{{--

    {{ method_field ('PUT') }}  --}}{{--Подмена метода передачи данных--}}{{--
    @csrf
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Submit</button>
</form>--}}

<form action="{{ route('contact') }}" method="post">
    {{-- csrf_field() --}}
    {{-- method_field('PUT') --}}
    @method('PUT')
    @csrf
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Submit</button>
</form>


</body>
</html>
