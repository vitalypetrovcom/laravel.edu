<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="{{ route ('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <button type="submit">Submit</button>
</form>



</body>
</html>
