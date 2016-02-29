function getStorageTable() {
    var hr = new XMLHttpRequest();
    var url = "getStorageTable.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("storageTableDiv").innerHTML = return_data;
            $('#storageTable').dataTable();
        }
    }
    hr.send();
}
getStorageTable();

function newStorageItemModal() {
    $("#storageItemCampaign").select2({
        placeholder: "Vali kampaania",
        data: campaignsList,
        minimumResultsForSearch: Infinity
    });             

    $("#storageItemSelect").select2({
        placeholder: "Vali toode",
        data: productsList,
        minimumResultsForSearch: Infinity
    });

    $('#productProducedDate').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3y',
        todayHighlight: true
    });

    $("#newStorageItemModal").modal({ show: true });
}

function addNewItemToStorage() {
    if (addingNewItemIsValid()) {
        var hr = new XMLHttpRequest();
        var url = "addNewStorageItem.php";
        var data = $('#newStorageItemForm').serialize();
        var campaignId = document.getElementById("storageItemCampaign").value;
        var productId = document.getElementById("storageItemSelect").value;
        data = data + "&productId=" + productId+"&campaignId="+campaignId;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getStorageTable();
                $('#newStorageItemModal').modal('hide');
            }
        }
        hr.send(data);
    }
}

function changeStorageItemModal(campaign, itemID, productID, productName, productDescription, productCategory, producedDate, itemLocation, buyingPrice, sellingPrice) {
    document.getElementById("modifyStorageItemID").value = itemID;
    $("#modifyStorageCampaignID").select2({
        placeholder: "Kampaania",
        data: campaignsList,
        minimumResultsForSearch: Infinity
    });  
    for (var i=0; i<campaignsList.length; i++) {
        if(campaignsList[i].text===campaign) {
            $("#modifyStorageCampaignID").select2("val", campaignsList[i].id);
        }
    }    
    document.getElementById("modifyStorageProductID").value = productID;
    document.getElementById("modifyStorageProductName").value = productName;
    $('#modifyStorageProducedDateSelect').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3y',
        todayHighlight: true
    });
    $('#modifyStorageProducedDateSelect').datepicker('update', producedDate);
    document.getElementById("modifyStorageProductBuyingPrice").value = buyingPrice;
    document.getElementById("modifyStorageProductSellingPrice").value = sellingPrice;
    document.getElementById("modifyProductAmountInStorage").value = 0;
    document.getElementById("modifyStorageProductLocation").value = itemLocation;    
    $("#modifyStorageItemModal").modal({ show: true });
}

function addingNewItemIsValid() {
    return true;
}

function updateStorageItem() {
    if(updateItemIsValid()){
        var hr = new XMLHttpRequest();
        var url = "updateStorageItem.php";
        var data = $('#modifyStorageItemForm').serialize();
        var campaignId = document.getElementById("modifyStorageCampaignID").value;
        data = data +"&campaignId="+campaignId;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getStorageTable();
                $('#modifyStorageItemModal').modal('hide');
            }
        }
        hr.send(data);
    }    
}

function updateItemIsValid() {
    return true;
}

function sellStorageItemToClientModal(storageItemId, productId, productName, buyingPrice, sellingPrice, amount){
    document.getElementById("sellStorageItemID").value = storageItemId;
    document.getElementById("sellProductID").value = productId;

    $("#sellStorageItemClientSelect").select2({
        placeholder: "Vali Klient",
        data: clientsList,
        minimumResultsForSearch: Infinity
    });

    $('#sellStorageProducedDateSelect').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3y',
        todayHighlight: true
    });

    document.getElementById("sellStorageProductName").value = productName;
    document.getElementById("sellStorageProductBuyingPrice").value = buyingPrice;
    document.getElementById("sellStorageProductSellingPrice").value = sellingPrice;       
    document.getElementById("storageAmount").value = amount;
    document.getElementById("sellingProductAmount").value = amount;   
    document.getElementById("sellStorageProductSellingProfit").value = amount*(sellingPrice-buyingPrice); 
    var amountListener = document.querySelector('#sellingProductAmount');
    amountListener.addEventListener('input', function () {
        document.getElementById("sellStorageProductSellingProfit").value = amountListener.value * (sellingPrice - buyingPrice);
        amount = amountListener.value;
    }); 
    var priceListener = document.querySelector('#sellStorageProductSellingPrice');
    priceListener.addEventListener('input', function () {
        document.getElementById("sellStorageProductSellingProfit").value = amount * (priceListener.value - buyingPrice);
        sellingPrice = priceListener.value;
    });  
    $("#sellStorageItemModal").modal({ show: true });
}

function sellStorageItem() {
    var storageAmount = document.getElementById("storageAmount").value;
    var actualAmount = document.getElementById("sellingProductAmount").value;
    if(storageAmount>=actualAmount){
        var hr = new XMLHttpRequest();
        var url = "sellStorageItem.php";
        var data = $('#sellStorageItemForm').serialize();
        var clientId = document.getElementById("sellStorageItemClientSelect").value;
        data = data +"&clientId="+clientId;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getStorageTable();
                $('#sellStorageItemModal').modal('hide');
            }
        }
        hr.send(data);
    }else{
        document.getElementById("storageAlert").classList.add("alert");
        document.getElementById("storageAlert").classList.add("alert-danger");
        document.getElementById("storageAlert").innerHTML = "Müüdav kogus on suurem kui laos on!";
    }
}