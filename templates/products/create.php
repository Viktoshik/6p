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
    <h1>Добавление товара</h1>
    <form action="/products/create" method="post">
        <input type="text" name="name" id="name" placeholder="Название">
        <select name="category_id" id="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="price" id="price">
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
