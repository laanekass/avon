<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if ( mysqli_num_rows($result)>0){
              echo '<table id="storageTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Kampaania</span></div></th>
                        <th><div><span>Toote nimetus</span></div></th>
                        <th><div><span>Kataloogi kood</span></div></th>
                        <th><div><span>Toote maht</span></div></th>
                        <th><div><span>Toote kirjeldus</span></div></th>
                        <th><div><span>Kategooria</span></div></th>
                        <th><div><span>Asukoht</span></div></th>
                        <th><div><span>Tootmise kuupäev</span></div></th>
                        <th><div><span>Ostu hind</span></div></th>
                        <th><div><span>Müügi hind</span></div></th>
                        <th><div><span>Ostu-müügi hinna vahe</span></div></th>
                        <th><div><span>Kogus</span></div></th>
                        <th><div><span>Kasum</span></div></th>                        
                        <th><div><span>Muuda</span></div></th>
                        <th><div><span>Müü kliendile</span></div></th>
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                     $item_id = $row['item_id'];
                     $product_id = $row['product_id'];
                     $buying_price = $row['buying_price'];
                     $selling_price = $row['selling_price'];
                     $amount = $row['amount'];
                     $unit_gap = $selling_price - $buying_price;
                     $total_gap = $unit_gap * $amount;
                     if ($row['product_catalogue_code'] == -1) {
                        $productCatalogueCode='Määramata';
                    }else {
                        $productCatalogueCode=$row['catalogue_code'];
                    }
                    echo '<tr>';
                        echo '<td>'.$row['campaign'].'</td>';
                        echo '<td>'.$row['product_name'].'</td>';
                        echo '<td>'.$productCatalogueCode.'</td>';
                        echo '<td>'.$row['product_unit'].'</td>';
                        echo '<td>'.$row['product_description'].'</td>';
                        echo '<td>'.$row['category'].'</td>';
                        echo '<td>'.$row['location'].'</td>';
                        echo '<td>'.$row['produced_date'].'</td>';
                        echo '<td>'.$buying_price.'</td>';
                        echo '<td>'.$selling_price.'</td>';
                        echo '<td>'.$unit_gap.'</td>';
                        echo '<td>'.$amount.'</td>';
                        echo '<td>'.$total_gap.'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeStorageItemModal(\''.$row['campaign'].'\', '.$item_id.', '.$product_id.' ,\''.$row['product_name'].'\', \''.$row['product_description'].'\' , 
                                \''.$row['category'].'\' , \''.$row['produced_date'].'\', \''.$row['location'].'\', '.$buying_price.', '.$selling_price.')")>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="sellStorageItemToClientModal('.$row['item_id'].', '.$product_id.' ,\''.$row['product_name'].'\', '.$buying_price.', '.$selling_price.', '.$amount.')")>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                            </button></td>';
                    echo '</tr>';
                 }
                echo '</tbody>
                </table>';
            }
        ?>    
    </body>
</html>
