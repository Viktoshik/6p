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
<h1>Характеристики</h1>
<a href="/attributes/create">Добваить характеристику</a>
<table>
    <tr>
        <td>Наименование</td>
        <td>Единица</td>
    </tr>
<?php foreach ($attributes as $attribute): ?>
<tr>
    <td><?=$attribute['name']?></td>
    <td><?=$attribute['unit']?></td>
    <td><a href="/attributes/delete/<?=$attribute['id']?>">Удалить</a></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>