<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            while($row = mysqli_fetch_array($client)) {
                echo '<H2>'.$row['client_name'].'</H2>';
            }
            if ( mysqli_num_rows($result)>0){                
              echo '<table id="clientSalesTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Toode</span></div></th>
                        <th><div><span>Müügi kuupäev</span></div></th>
                        <th><div><span>Müüdud kogus</span></div></th>
                        <th><div><span>Müügi hind</span></div></th>
                        <th><div><span>Kasum</span></div></th>
                     </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td><b>Kokku: </b></td>
                        <td/>
                        <td/>';
            while($row = mysqli_fetch_array($totals)) {
              echo '<td><b>'.$row['totalSum'].'</b></td>';
              echo '<td><b>'.$row['totalProfit'].'</b></td>';
            }
              echo '</tr>
                </tfoot>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['product_name'].'</td>';
                        echo '<td>'.$row['sale_date'].'</td>';
                        echo '<td>'.$row['amount'].'</td>';
                        echo '<td>'.$row['selling_price'].'</td>';
                        echo '<td>'.$row['profit'].'</td>';                        
                    echo '</tr>';
                 }
                echo '</tbody>
                </table>';
            }
        ?>    
    </body>
</html>
