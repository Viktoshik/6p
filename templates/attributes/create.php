<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Добавить характеристику</h1>
<form action="/attributes/create" method="post">
    <input type="text" name="name" placeholder="Название">
    <input type="text" name="unit" placeholder="Еденица измерения">
    <input type="submit">
</form>
</body>
</html>