var unitsList;
function getUnitsList() {
    var hr = new XMLHttpRequest();
    var url = "getUnitsList.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            unitsList = JSON.parse(hr.responseText);
        }
    }
    hr.send();
}  

getUnitsList();  

function getUnitsTable() {
    var hr = new XMLHttpRequest();
    var url = "getUnitsTable.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("unitsTableDiv").innerHTML = return_data;
            $('#productUnitTable').dataTable();
        }
    }
    hr.send();
}
getUnitsTable(); 

function newUnitModal() {
    $("#newUnitModal").modal({ show: true });
}

function saveNewUnit() {
    var name = document.getElementById("unitName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "addNewUnit.php";
        var data = $('#newUnitForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getUnitsTable();
                $('#newUnitModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("unitAlert").classList.add("alert");
        document.getElementById("unitAlert").classList.add("alert-danger");
        document.getElementById("unitAlert").innerHTML = "Ühiku nimetus peab olema määratud!";
    }
}

function changeUnitModal(unitID, unitName, unitShortenedName) {
    document.getElementById("modifyUnitID").value = unitID;
    document.getElementById("modifyUnitName").value = unitName;
    document.getElementById("modifyUnitShortenedName").value = unitShortenedName;
    $("#modifyUnitModal").modal({ show: true });
}

function updateUnit() {
    var name = document.getElementById("modifyUnitName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "updateUnit.php";
        var data = $('#modifyUnitForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getUnitsTable();
                $('#modifyUnitModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("unitAlert").classList.add("alert");
        document.getElementById("unitAlert").classList.add("alert-danger");
        document.getElementById("unitAlert").innerHTML = "Ühiku nimetus peab olema määratud!";
    }
}

function archiveCategory(unitId) {
    BootstrapDialog.confirm('Kas oled kindel, et soovid ühiku arhiveerida? (ei saa enam uutele toodetele lisada)', function (result) {
        if (result) {
            deleteUnit(unitId);
        }
    });
}

function deleteUnit(unitId) {
    var hr = new XMLHttpRequest();
    var url = "deleteUnit.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            getUnitsTable();
        }
    }
    hr.send("unitID=" + unitId);
}