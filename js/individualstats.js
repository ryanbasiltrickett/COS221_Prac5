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

function loadPB(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        console.log(this.response);
        var data = JSON.parse(this.response);
        pb = document.getElementById("PBs");
        pbLabel = document.getElementById("pbLabel");
        if (data.status == "success"){
            pbLabel.innerHTML="Personal Bests:";
            inner = "<tr>   <th>Time</th>  <th>Stroke</th>  <th>Distance</th> </tr>";
            var arr = (data.data[0]);
           
            for (var key in data.data){
                
                inner+="<tr><td>"+data.data[key].Time+"</td><td>"+data.data[key].Stroke_Name+"</td><td>"+data.data[key].Distance+"</td></tr>"
            
            }
            pb.innerHTML = inner;
        }
        else {
            alert("No data available for selected swimmer");
           
            pb.innerHTML = "";
            pbLabel.innerHTML="";
        }

        loadEvents();
    }

    params = {
        "function": "getSwimmerPB",
        "swimmerId" : document.getElementById("swimmer").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
    
}

function loadEvents(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        console.log(this.response);
        var data = JSON.parse(this.response);
        pb = document.getElementById("events");
        pbLabel = document.getElementById("eventLabel");
        if (data.status == "success"){
            pbLabel.innerHTML="Event Stats:";
            inner = "<tr>   <th>Tournament Name</th>  <th>Tournament Phase</th> <th>Stroke</th> <th>Distance</th> <th>Time</th></tr>";
            var arr = (data.data[0]);
           
            for (var key in data.data){
                
                inner+="<tr><td>"+data.data[key].Name+"</td><td>"+data.data[key].Classification+"</td><td>"+data.data[key].Stroke_Name+"</td><td>"+data.data[key].Distance+"</td><td>"+data.data[key].Time+"</td></tr>"
            
            }
            pb.innerHTML = inner;
        }
        else {

            
            pb.innerHTML = "";
            pbLabel.innerHTML="";
        }
    }

    params = {
        "function": "getSwimmerEvents",
        "swimmerId" : document.getElementById("swimmer").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}