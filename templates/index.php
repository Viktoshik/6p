 <h1>Популярные</h1>
 <h2>Категории</h2>
    <?php foreach ($categories as $category): ?>
        <?php if($category['pop'] == 1): ?>
        <a href="/catalog/<?=$category['slug']?>"><?=$category['name']?></a>
        <?php endif; ?>
    <?php endforeach;?>
    <h2>Товары</h2>
 <?php foreach ($products as $product): ?>
 <table>
     <tr>
         <td><?=$product['name']?></td>
         <td><?=$product['price']?></td>
         <td><a href="/catalog/show/<?=$product['slug']?>">Подробнее</a></td>
         <td><a href="/products/<?=$product['id']?>/applications">Арендовать</a></td>
     </tr>
 </table>
 <?php endforeach;?>


