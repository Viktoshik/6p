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
<h1>Товары</h1>
<a href="/products/create">Добавить</a>
<table>
    <tr>
        <td>name</td>
        <td>category_id</td>
        <td>price</td>
        <td>Выводится на главную</td>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?=$product['name']?></td>
            <td><?=$product['category_id']?></td>
            <td><?=$product['price']?></td>
            <?php if ($product['pop'] == 1): ?>
            <td>Да</td>
            <?php else: ?>
            <td>Нет</td>
            <?php endif; ?>
            <td><a href="/products/<?=$product['id']?>/addAttributes">Добавить характеристику</a></td>
            <td><a href="/products/<?=$product['id']?>/edit">Изменить</a></td>
            <td><a href="/products/<?=$product['id']?>/delete">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
