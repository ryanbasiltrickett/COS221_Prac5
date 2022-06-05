function loadUpdate()
{
    loadLocations();
    loadDetails();
}


function loadLocations(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            locationSelect = document.getElementById("location");
            inner = "";
            for (i = 0; i < data.data.length; i++)
            {
                inner += '<option value="' + data.data[i].location_id + '">' + data.data[i].location_name + '</option>';
            }

            locationSelect.innerHTML = inner;
        }
    }

    params = {
        "function": "getAllLocations"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function loadDetails(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            document.getElementById("location_name").value = data.data[0].Tournament_Location.trim();
            document.getElementById("timezone").value = data.data[0].timezone.trim();
            document.getElementById("latitude").value = data.data[0].latitude.trim();
            document.getElementById("longitude").value = data.data[0].longitude.trim();
            document.getElementById("country_code").value = data.data[0].country_code.trim();
        }
        else {
            alert("Error occured when obtaining location details");
        }
    }

    params = {
        "function": "getLocationDetails",
        "locationId" : document.getElementById("location").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}


function addLocation()
{
    timezone = document.getElementById("timezone").value.trim();
    latitude = document.getElementById("latitude").value.trim();
    longitude = document.getElementById("longitude").value.trim();
    country_code = document.getElementById("country_code").value.trim();
    location_name = document.getElementById("location_name").value.trim();

    if (timezone == "" || latitude == "" || longitude == "" || country_code == "" || location_name == "")
        return;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Location added successfully");
        }
        else {
            alert("Error occured when adding location");
        }
    }

    params = {
        "function": "addLocation",
        "timezone" : timezone,
        "latitude" : latitude,
        "longitude" : longitude,
        "country_code" : country_code,
        "location_name" : location_name,
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function updateLocation()
{
    id = document.getElementById("location").value;
    location_name = document.getElementById("location_name").value.trim();
    timezone = document.getElementById("timezone").value.trim();
    latitude = document.getElementById("latitude").value.trim();
    longitude = document.getElementById("longitude").value.trim();
    country_code = document.getElementById("country_code").value.trim();

    if (location_name == "" || timezone == "" || latitude == "" || longitude == "" || country_code == "")
        return;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Location updated successfully");
            loadLocations();
        }
        else {
            alert("Error occured when updating location");
        }
    }

    params = {
        "function": "updateLocation",
        "id" : id,
        "location_name" : location_name,
        "timezone" : timezone,
        "latitude" : latitude,
        "longitude" : longitude,
        "country_code" : country_code,
    };

    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function loadTournaments()
{
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            tournamentSelect = document.getElementById("tournament");
            inner = "";
            for (i = 0; i < data.data.length; i++)
            {
                inner += '<option value="' + data.data[i].tournament_id + '">' + data.data[i].name + '</option>';
            }

            tournamentSelect.innerHTML = inner;
            loadTournamentDetails();
        }
    }

    params = {
        "function": "getAllTournaments"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function loadTournamentDetails()
{
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            document.getElementById("name").value = data.data[0].name;
            document.getElementById("start").value = data.data[0].start;
            document.getElementById("end").value = data.data[0].end;
        }
        else {
            alert("Error occured when obtaining location details");
        }
    }

    params = {
        "function": "getTournamentDetails",
        "tournamentId" : document.getElementById("tournament").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function updateTournament()
{
    tName = document.getElementById("name").value.trim();
    start = document.getElementById("start").value;
    end = document.getElementById("end").value;

    if (tName == "" || start == "" || end == "")
        return;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Tournament updated successfully");
        }
        else {
            alert("Error occured when updating tournament");
        }
    }

    params = {
        "function": "updateTournament",
        "tournamentId" : document.getElementById("tournament").value,
        "name" : tName,
        "start" : start,
        "end" : end,
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function addTournament()
{
    tName = document.getElementById("name").value.trim();
    start = document.getElementById("start").value;
    end = document.getElementById("end").value;

    if (tName == "" || start == "" || end == "")
        return;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Tournament added successfully");
        }
        else {
            alert("Error occured when adding tournament");
        }
    }

    params = {
        "function": "addTournament",
        "name" : tName,
        "start" : start,
        "end" : end
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}