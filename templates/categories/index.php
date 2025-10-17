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
    <h1>Категории</h1>
    <a href="/categories/create">Добавить</a>
    <table>
        <tr>
            <td>name</td>
            <td>parent_id</td>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?=$category['name']?></td>
                <td><?=$category['parent_id']?></td>
                <td><a href="/categories/<?=$category['id']?>/edit">Изменить</a></td>
                <td><a href="/categories/<?=$category['id']?>/delete">Удалить</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
