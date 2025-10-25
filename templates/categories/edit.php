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
<h1>Редактирование категории</h1>
<form action="/categories/<?=$category['id']?>/edit" method="post">
    <input type="text" name="name" id="name" placeholder="Название" value="<?=$category['name']?>">
    <select name="parent_id" id="parent_id">
        <option value=""> </option>
        <?php foreach ($parentCategories as $parentCategory): ?>
            <option value="<?= $parentCategory['id'] ?>"<?=$parentCategory['id']===$category['parent_id']?'selected':''?>><?= $parentCategory['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="">Выводить на главную</label>
    <input type="checkbox" name="pop">
    <button type="submit">Изменить</button>
</form>
</body>
</html>
