<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if ( mysqli_num_rows($result)>0){
              echo '<table id="productTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Toote nimetus</span></div></th>
                        <th><div><span>Maht</span></div></th>
                        <th><div><span>Kategooria</span></div></th>
                        <th><div><span>Kirjeldus</span></div></th>
                        <th><div><span>Muuda</span></div></th>
                        <th><div><span>Arhiveeri</span></div></th>
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    $unit_id = $row['unit_id'];
                    $amount = $row['amount'];
                    echo '<tr>';
                        echo '<td>'.$row['product'].'</td>';
                        echo '<td>'.$row['unit_amount'].'</td>';
                        echo '<td>'.$row['category'].'</td>';
                        echo '<td>'.$row['description'].'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeProductModal('.$row['product_id'].', \''.$row['product'].'\' , '.$row['category_id'].' ,'.$unit_id.' , '.$amount.' , \''.$row['description'].'\')")>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" 
                                title="Arhiveeritud toodet ei ole enam tabelis näha ja seda ei saa lattu panna ja klientide müükidele lisada." onClick="archiveProduct('.$row['product_id'].')")>
                                <span class="glyphicon glyphicon-stop" aria-hidden="true"></span> 
                            </button></td>';
                    echo '</tr>';
                 }
                echo '</tbody>
                </table>';
            }
        ?>    
    </body>
</html>
