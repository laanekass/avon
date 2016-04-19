<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if ( mysqli_num_rows($result)>0){
              echo '<table id="clientTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Eesnimi</span></div></th>
                        <th><div><span>Perekonnanimi</span></div></th>
                        <th><div><span>Sünnipäev</span></div></th>
                        <th><div><span>Telefon</span></div></th>
                        <th><div><span>E-Mail</span></div></th>
                        <th><div><span>Aadress</span></div></th>
                        <th><div><span>Ostud</span></div></th>
                        <th><div><span>Reservis</span></div></th>
                        <th><div><span>Muuda</span></div></th>
                        <th><div><span>Arhiveeri</span></div></th>
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['first_name'].'</td>';
                        echo '<td>'.$row['last_name'].'</td>';
                        echo '<td>'.$row['birthday'].'</td>';
                        echo '<td>'.$row['phone'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['address'].'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="viewClientSalesModal('.$row['client_id'].')")>
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="viewClientReservedProductsModal('.$row['client_id'].')")>
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeClientModal('.$row['client_id'].', \''.$row['first_name'].'\' , \''.$row['last_name'].'\', \''.$row['birthday'].'\', '.$row['phone'].', \''.$row['email'].'\', \''.$row['address'].'\')")>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" 
                                title="Arhiveeritud klienti ei ole enam tabelis näha ja temale ei saa tooteid lisada." onClick="archiveClient('.$row['client_id'].')")>
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
