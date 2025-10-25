    <h1>Категории</h1>
   <table>
       <tr>
           <td>name</td>
           <td>price</td>
       </tr>
       <?php foreach ($products as $product): ?>
       <tr>
           <td><a href="/catalog/show/<?=$product['slug']?>"><?=$product['name']?></a></td>
           <td><?=$product['price']?></td>
       </tr>
       <?php endforeach;?>
   </table>
