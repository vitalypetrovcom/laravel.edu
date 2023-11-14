<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    {!! $body !!}
{{-- Для того, чтобы добавить картинку в тело письма используется предустановленная переменная message  --}}

    <img src="{{ $message->embed(url ('img/2.jpg')) }}" alt="">

</body>
</html>
