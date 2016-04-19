<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            $clientName = '';
            $clientId = -1;
            while($row = mysqli_fetch_array($client)) {
                $clientName = $row['client_name'];
                $clientId = $row['client_id'];
            }
        ?>
        <div class="modal fade" id="clientReservedProductsModal" tabindex="-1" role="dialog" aria-labelledby="clientReserveModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> 
                            <span class="col-xs-6">
                                <?php echo $clientName; ?>-il reservis
                            </span>
                            <span class="col-xs-6">
                                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" onClick="newReservedProductModal(<?php echo $clientId; ?>)"
                                        >Lisa uus toode reservi <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                                </button>
                            </span>
                        </h4>
                    </div>
                    <div class="modal-body"> 
                        <div id="newClientReservedProductForm">
                            <div id="clientReservedProductAlert"></div>

                            <div class="form-group">
                                <label for="clientReservedProductsCampaign">Kampaania </label>
                                <select class="form-control" id="clientReservedProductsCampaign" style="width:40%;"></select>
                            </div>
                            <div class="form-group">
                                <label for="clientReservedItemName">Toote nimetus</label>
                                <select class="form-control" id="clientReservedItemSelect" style="width:100%;"></select>
                            </div>  

                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tagasi</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
