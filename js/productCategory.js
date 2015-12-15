var productCategoriesList;
function getProductCategoriesList() {
    var hr = new XMLHttpRequest();
    var url = "getCategoriesList.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            productCategoriesList = JSON.parse(hr.responseText);
        }
    }
    hr.send();
}
getProductCategoriesList();

function getCategoriesTable() {
    var hr = new XMLHttpRequest();
    var url = "getCategoriesTable.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("categoriesTableDiv").innerHTML = return_data;
            $('#productCategoryTable').dataTable();
        }
    }
    hr.send();
}
getCategoriesTable();

function saveNewCategory() {
    var name = document.getElementById("categoryName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "addNewCategory.php";
        var data = $('#newCategoryForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getCategoriesTable();
                $('#newCategoryModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("categoryAlert").classList.add("alert");
        document.getElementById("categoryAlert").classList.add("alert-danger");
        document.getElementById("categoryAlert").innerHTML = "Kategooria nimetus peab olema määratud!";
    }
}

function changeCategoryModal(categoryID, categoryName, categoryDescription) {
    document.getElementById("modifyProductID").value = categoryID;
    document.getElementById("modifyCategoryName").value = categoryName;
    document.getElementById("modifyCategoryDescription").value = categoryDescription;
    $("#modifyCategoryModal").modal({ show: true });
}

function updateCategory() {
    var name = document.getElementById("modifyCategoryName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "updateCategory.php";
        var data = $('#modifyCategoryForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getCategoriesTable();
                $('#modifyCategoryModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("categoryAlert").classList.add("alert");
        document.getElementById("categoryAlert").classList.add("alert-danger");
        document.getElementById("categoryAlert").innerHTML = "Kategooria nimetus peab olema määratud!";
    }
}

function archiveCategory(categoryId) {
    BootstrapDialog.confirm('Kas oled kindel, et soovid kategooria arhiveerida? (ei saa enam uutele toodetele lisada)', function (result) {
        if (result) {
            deleteCategory(categoryId);
        }
    });
}

function deleteCategory(categoryId) {
    var hr = new XMLHttpRequest();
    var url = "deleteCategory.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            getCategoriesTable();
        }
    }
    hr.send("categoryID=" + categoryId);
}