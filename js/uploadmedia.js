
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

function uploadMedia() {

    //return;
    
    id = document.getElementById("swimmer").value;
    image = document.getElementById("file").files[0].name;


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Media uploaded successfully");
        }
        else {
            //alert("Error occured when uploading media");
            alert(data.status);
            console.log(data.status);
        }
    }

    params = {
        "function": "uploadMedia",
        "id" : id,
        "image" : image,
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

