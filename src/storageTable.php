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
                        <th><div><span>Toote nimetus</span></div></th>
                        <th><div><span>Toote kirjeldus</span></div></th>
                        <th><div><span>Kategooria</span></div></th>
                        <th><div><span>Tootmise kuupäev</span></div></th>
                        <th><div><span>Säilivus (kuudes)</span></div></th>
                        <th><div><span>Ostu hind</span></div></th>
                        <th><div><span>Müügi hind</span></div></th>
                        <th><div><span>Kogus</span></div></th>
                        <th><div><span>Muuda</span></div></th>
                        <th><div><span>Müü kliendile</span></div></th>
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['product_name'].'</td>';
                        echo '<td>'.$row['product_description'].'</td>';
                        echo '<td>'.$row['category'].'</td>';
                        echo '<td>'.$row['produced_date'].'</td>';
                        echo '<td>'.$row['preservation'].'</td>';
                        echo '<td>'.$row['buying_price'].'</td>';
                        echo '<td>'.$row['selling_price'].'</td>';
                        echo '<td>'.$row['amount'].'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeStorageItemModal('.$row['product_name'].', \''.$row['product_description'].'\' , '.$row['category'].' , \''.$row['produced_date'].'\')")>
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
