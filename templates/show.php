<div>
    <?php foreach ($cat as $category): ?>
        <a href="<?=$category['slug']?>"><?=$category['name']?></a>
    <?php endforeach; ?>
</div>
<?php foreach ($products as $product): ?>
<td><a href="/catalog/show/<?=$product['slug']?>"><?=$product['name']?></a>
    <?=$product['price']?>
<?php endforeach; ?>
