<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - Not Found</title>
</head>
<body>

<h1>{{ $exception->getMessage() }}</h1> {{-- Все ошибки у нас находятся в объекте $exception к которому мы можем обратиться используя метод getMessage --}}

</body>
</html>
