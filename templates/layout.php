<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title??''?></title>
</head>
<body>
    <div>
        <a href="/">Главная</a>
        <a href="/catalog">Каталог</a>
        <?php foreach ($categories as $category): ?>
        <a href="/catalog/<?=$category['slug']?>"><?=$category['name']?></a>
        <?php endforeach; ?>
    </div>
    <?=$content?>
</body>
</html>