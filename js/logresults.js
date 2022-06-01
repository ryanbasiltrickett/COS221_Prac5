function loadIndividualPage()
{
    loadSwimmers();
    loadTournaments();
}

function loadTeamPage()
{
    loadTeamSwimmers();
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
    //still to implement
}