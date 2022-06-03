function loadUpdate()
{
    
    loadTournaments();
    loadTournamentStats();
    
}

function loadTournaments(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            swimmerSelect = document.getElementById("tournament");
            inner = "";
            for (i = 0; i < data.data.length; i++)
            {
                inner += '<option value="' + data.data[i].tournament_id + '">' + data.data[i].name  + '</option>';
            }

            swimmerSelect.innerHTML = inner;
        }
    }

    params = {
        "function": "getAllTournaments"
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
    
}

function loadTournamentStats(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        console.log(this.response);
        var data = JSON.parse(this.response);
        pb = document.getElementById("tournamentStats");
        pbLabel = document.getElementById("tournStatLabel");
        if (data.status == "success"){
            pbLabel.innerHTML="Tournaments Events:";
            inner = "<tr>   <th>Stroke</th>  <th>Distance</th>  <th>Date</th> <th>Classification</th> <th>Winner</th> <th>Time</th></tr>";
            var arr = (data.data[0]);
           
            for (var key in data.data){
                
                inner+="<tr><td>"+data.data[key].Stroke_Name+"</td><td>"+data.data[key].Distance+"</td><td>"+data.data[key].Date+
                "</td><td>"+data.data[key].Classification+"</td><td>"+data.data[key].Name+"</td><td>"+data.data[key].Time+"</td></tr>"
            
            }
            pb.innerHTML = inner;
        }
        else {

            alert("Error occured when obtaining swimmer's stats");
            pb.innerHTML = "";
            pbLabel.innerHTML="";
        }
    }

    params = {
        "function": "getTournamentEvents",
        "tournamentId" : document.getElementById("tournament").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
    
}
