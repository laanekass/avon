var campaignsList;
function getCampaignsList() {
    var hr = new XMLHttpRequest();
    var url = "getCampaignsList.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            campaignsList = JSON.parse(hr.responseText);
        }
    }
    hr.send();
}            
getCampaignsList();

var lastCampaignYear, lastCampaignNumber;
function getLastCampaign() {
    var hr = new XMLHttpRequest();
    var url = "getLastCampaign.php";
    hr.open("GET", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            lastCampaignYear = JSON.parse(hr.responseText)[0].year;
            lastCampaignNumber = JSON.parse(hr.responseText)[0].campaign_number;
        }
    }
    hr.send();
}

getLastCampaign();

function newCampaignModal() {
    var date = new Date();
    document.getElementById("campaignYear").value = date.getFullYear();
    document.getElementById("campaignNumber").value = parseInt(lastCampaignNumber) + 1;
    $("#newCampaignModal").modal({ show: true });
}

function newCampaignModalFromStorage() {
    $('#newStorageItemModal').modal('hide');
    newCampaignModal();
}

function addNewCampaign() {
    if (addingNewCampaignIsValid()) {
        var hr = new XMLHttpRequest();
        var url = "addCampaign.php";
        var data = $('#newCampaignForm').serialize();
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                getCampaignsList();
                getLastCampaign();
                $('#newCampaignModal').modal('hide');
                location.reload();
            }
        }
        hr.send(data);
    }
}

function addingNewCampaignIsValid() {
    return true;
}