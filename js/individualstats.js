function loadUpdate()
{
    
    loadSwimmers();
    loadPB();
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

function loadPB(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        console.log(this.response);
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            pb = document.getElementById("PBs");
            inner = "<tr>   <th>Time</th>  <th>Stroke</th>  </tr>";
            var arr = (data.data[0]);
           
            for (var key in data.data){
                
                inner+="<tr><td>"+data.data[key].Time+"</td><td>"+data.data[key].Stroke_Name+"</td>/<tr>"
            
            }
            pb.innerHTML = inner;
        }
        else {

            alert("Error occured when obtaining swimmer's stats");
            pb.innerHTML = "";
        }
    }

    params = {
        "function": "getSwimmerPB",
        "swimmerId" : document.getElementById("swimmer").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}