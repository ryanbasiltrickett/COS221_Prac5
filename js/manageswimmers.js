function loadSwimmers(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        alert(this.response);
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

function loadDetails(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        alert(this.response);
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            document.getElementById("fname").value = data.data[0].first;
            document.getElementById("mname").value = data.data[0].mid;
            document.getElementById("lname").value = data.data[0].last;
            document.getElementById("id").value = data.data[0].id;
        }
        else {
            alert("Error occured when obtaining swimmer's details");
        }
    }

    params = {
        "function": "getSwimmerDetails",
        "swimmerId" : document.getElementById("swimmer").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function deleteSwimmer(){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        alert(this.response);
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            loadSwimmers();
        }
        else {
            alert("Error occured when deleting swimmer");
        }
    }

    params = {
        "function": "deleteSwimmer",
        "swimmerId" : document.getElementById("swimmer").value
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}