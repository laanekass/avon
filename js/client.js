var clientsList;
function getClientsList() {
    var hr = new XMLHttpRequest();
    var url = "getClientsList.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            clientsList = JSON.parse(hr.responseText);
        }
    }
    hr.send();
}            
getClientsList();

function getClientsTable() {
    var hr = new XMLHttpRequest();
    var url = "getClientsTable.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("clientsTableDiv").innerHTML = return_data;
            $('#clientsTable').dataTable();
        }
    }
    hr.send();
}
getClientsTable();

function newClientModal() {    
    $("#newClientModal").modal({ show: true });
}

function saveNewClient() {
    var name = document.getElementById("clientFirstName").value+document.getElementById("clientLastName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "addNewclient.php";
        var data = $('#newClientForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getClientsTable();
                $('#newClientModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("clientAlert").classList.add("alert");
        document.getElementById("clientAlert").classList.add("alert-danger");
        document.getElementById("clientAlert").innerHTML = "Kliendil peab ees- või perekonnanimi olema määratud!";
    }
}

function changeClientModal(clientID, firstName, lastName, birthday, phone, email, address) {
    document.getElementById("modifyClientID").value = clientID;
    document.getElementById("modifyClientFirstName").value = firstName;    
    document.getElementById("modifyClientLastName").value = lastName;
    document.getElementById("modifyClientBirthday").value = birthday;
    document.getElementById("modifyClientPhone").value = phone;
    document.getElementById("modifyClientEmail").value = email;
    document.getElementById("modifyClientAddress").value = address;
    $("#modifyClientModal").modal({ show: true });
}

function updateClient() {
    var name = document.getElementById("modifyClientFirstName").value+document.getElementById("modifyClientLastName").value;
    if (name !== undefined && name !== "") {
        var hr = new XMLHttpRequest();
        var url = "updateClient.php";
        var data = $('#modifyClientForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getClientsTable();
                $('#modifyClientModal').modal('hide');
            }
        }
        hr.send(data);
    } else {
        document.getElementById("clientAlert").classList.add("alert");
        document.getElementById("clientAlert").classList.add("alert-danger");
        document.getElementById("clientAlert").innerHTML = "Kliendil peab ees- või perekonnanimi olema määratud!";
    }
}

function archiveClient(clientId) {
    BootstrapDialog.confirm('Kas oled kindel, et soovid kliendi arhiveerida? (ei saa enam tooteid lisada)', function (result) {
        if (result) {
            deleteClient(clientId);
        }
    });
}

function deleteClient(clientId) {
    var hr = new XMLHttpRequest();
    var url = "deleteClient.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            getClientsTable();
        }
    }
    hr.send("clientID=" + clientId);
}
