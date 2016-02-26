function getProductsTable() {
    var hr = new XMLHttpRequest();
    var url = "getProductsTable.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("productsTableDiv").innerHTML = return_data;
            $('#productTable').dataTable();
        }
    }
    hr.send();
}
getProductsTable();

var productsList;
function getProductsList() {
    var hr = new XMLHttpRequest();
    var url = "getProductsList.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            productsList = JSON.parse(hr.responseText);
        }
    }
    hr.send();
}
getProductsList();

function newProductModal() {
    $("#productUnitSelect").select2({
        placeholder: "Vali Ühik",
        data: unitsList,
        minimumResultsForSearch: Infinity
    });
    $("#productCategorySelect").select2({
        placeholder: "Vali kategooria",
        data: productCategoriesList,
        minimumResultsForSearch: Infinity
    });
    $("#newProductModal").modal({ show: true });
}

function saveNewProduct() {
    var name = document.getElementById("productName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "addNewProduct.php";
        var data = $('#newProductForm').serialize();
        var unitId =  document.getElementById("productUnitSelect").value;
        var categoryId = document.getElementById("productCategorySelect").value;
        data = data + "&categoryId=" + categoryId + "&unitId=" + unitId;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getProductsTable();
                $('#newProductModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("productAlert").classList.add("alert");
        document.getElementById("productAlert").classList.add("alert-danger");
        document.getElementById("productAlert").innerHTML = "Toote nimetus peab olema määratud!";
    }
}

function changeProductModal(productID, productName, productCategory, productDescription) {
    console.log('HERE');
    console.log(productID);
    document.getElementById("modifyProductID").value = productID;
    document.getElementById("modifyProductName").value = productName;
    $("#modifyProductCategorySelect").select2({
        placeholder: "Vali kategooria",
        data: productCategoriesList,
        minimumResultsForSearch: Infinity
    });
    $('select[id=modifyProductCategorySelect]').val(productCategory);
    $('select[id=modifyProductCategorySelect]').change()
    document.getElementById("modifyProductDescription").value = productDescription;
    $("#modifyProductModal").modal({ show: true });
}

function updateProduct() {
    var name = document.getElementById("modifyProductName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "updateProduct.php";
        var data = $('#modifyProductForm').serialize();
        var categoryId = document.getElementById("modifyProductCategorySelect").value;
        data = data + "&categoryId=" + categoryId;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getProductsTable();
                $('#modifyProductModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("productAlert").classList.add("alert");
        document.getElementById("productAlert").classList.add("alert-danger");
        document.getElementById("productAlert").innerHTML = "Toote nimetus peab olema määratud!";
    }
}

function archiveProduct(productId) {
    BootstrapDialog.confirm('Kas oled kindel, et soovid toote arhiveerida? (ei saa enam lattu ega klientidele lisada)', function (result) {
        if (result) {
            deleteProduct(productId);
        }
    });
}

function deleteProduct(productId) {
    var hr = new XMLHttpRequest();
    var url = "deleteProduct.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            getProductsTable();
        }
    }
    hr.send("productID=" + productId);
}