<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if ( mysqli_num_rows($result)>0){
              echo '<table id="productCategoryTable" class="table table-striped table-hover">
                <thead>
                     <tr>
                        <th><div><span>Kategooria</span></div></th>
                        <th><div><span>Kirjeldus</span></div></th>
                        <th><div><span>Muuda</span></div></th>
                        <th><div><span>Arhiveeri</span></div></th>
                     </tr>
                </thead>
                <tbody>';
                 while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['description'].'</td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="modal" 
                                onClick="changeCategoryModal('.$row['product_category_id'].', \''.$row['name'].'\' , \''.$row['description'].'\')")>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                            </button></td>';
                        echo '<td><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" 
                                title="Arhiveeritud kategooriat ei ole enam tabelis näha ja seda ei saa uutele toodetele määrata." onClick="archiveCategory('.$row['product_category_id'].')")>
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
