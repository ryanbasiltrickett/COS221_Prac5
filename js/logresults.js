function loadIndividualPage()
{
    loadSwimmers();
    loadTournaments();
    loadEvents();
}

function loadTeamPage()
{
    loadTeamSwimmers();
    loadTournaments();
    loadEvents();
}

function loadSwimmers(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            swimmerSelect = document.getElementById("swimmer");
            inner = "";
            for (i = 0; i < data.data.length; i++)
            {
                inner += '<option value="' + data.data[i].swimmer_id + '">' + data.data[i].name + ' (' + data.data[i].id + ')</option>';
            }

            swimmerSelect.innerHTML = inner;
        }
    }

    params = {
        "function": "getAllSwimmers"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function loadTeamSwimmers(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            swimmerSelect1 = document.getElementById("swimmer1");
            swimmerSelect2 = document.getElementById("swimmer2");
            swimmerSelect3 = document.getElementById("swimmer3");
            swimmerSelect4 = document.getElementById("swimmer4");
            inner = "";
            for (i = 0; i < data.data.length; i++)
            {
                inner += '<option value="' + data.data[i].swimmer_id + '">' + data.data[i].name + ' (' + data.data[i].id + ')</option>';
            }

            swimmerSelect1.innerHTML = inner;
            swimmerSelect2.innerHTML = inner;
            swimmerSelect3.innerHTML = inner;
            swimmerSelect4.innerHTML = inner;
        }
    }

    params = {
        "function": "getAllSwimmers"
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
        }
    }

    params = {
        "function": "getAllTournaments"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function loadEvents(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        
         var data = JSON.parse(this.response);
 
         if (data.status == "success"){
            let events = data.data;
            eventsDropDown = document.getElementById("event");
            for (let event of events){
                eventOption = document.createElement("option");
                eventOption.value = event.id;

                var fullName = event.dist +"m "+event.name+" ("+event.gender+")";
                eventOption.text = fullName;
                eventsDropDown.appendChild(eventOption);
            }
         } else {
            console.log("Could not retrieve event data");
         }
     }

     params = {
        "function": "getEvents"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}