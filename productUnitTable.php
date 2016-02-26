<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if ( mysqli_num_rows($result)>0){
              echo '<table id="productUnitTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Ühiku nimetus</span></div></th>
                        <th><div><span>Ühiku lühend</span></div></th>
                        <th><div><span>Muuda</span></div></th>                        
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['shortened_name'].'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeUnitModal('.$row['unit_id'].', \''.$row['name'].'\' , \''.$row['shortened_name'].'\')")>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                            </button></td>';
                       /* echo '<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" 
                                title="Arhiveeritud ühikut ei ole enam tabelis näha ja seda ei saa uutele toodetele määrata." onClick="archiveUnit('.$row['unit_id'].')")>
                                <span class="glyphicon glyphicon-stop" aria-hidden="true"></span> 
                            </button></td>';*/
                    echo '</tr>';
                 }
                echo '</tbody>
                </table>';
            }
        ?>
    </body>
</html>
