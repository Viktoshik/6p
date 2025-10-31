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
<h1></h1>
<form action="/products/<?= $product['id'] ?>/addAttributes" method="post">
    <select name="attribute" id="">
        <?php foreach ($attributes as $attribute): ?>
            <option value="<?= $attribute['id'] ?>"><?= $attribute['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="value">
    <input type="submit">
</form>
<div>
    Уже имеющиеся характеристики
    <table>
        <tr>
            <td>Атрибут</td>
            <td>Значение</td>
        </tr>
        <?php foreach ($product_attributes as $attribute): ?>
            <tr>
                <td><?= $attribute['attribute_name'] ?></td>
                <td><?= $attribute['value'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
</body>
</html>
