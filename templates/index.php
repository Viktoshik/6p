    <h1>Категории</h1>
   <table>
       <tr>
           <td>name</td>
           <td>price</td>
       </tr>
       <?php foreach ($products as $product): ?>
       <tr>
           <td><?=$product['name']?></td>
           <td><?=$product['price']?></td>
       </tr>
       <?php endforeach;?>
   </table>
