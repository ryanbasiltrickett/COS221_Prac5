
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

    return true;
    
    id = document.getElementById("swimmer").value;
    uimage = document.getElementById("file");

    /*uploaded_image.addEventListener("change", function() {
        reader = new FileReader();
        reader.addEventListener("load", () => {
          image = reader.result;
        });
        alert(image);
      });*/

      /*var reader = new FileReader();
      reader.readAsDataURL(uimage.files[0]);
      fReader.onloadend = function(event){
          var img = document.getElementById("yourImgTag");
          img.src = event.target.result;
      }
      reader.addEventListener('load', (e) => {
         image = e.target.result;
      });*/

      //alert(fReader);
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            alert("Media uploaded successfully");
        }
        else {
            alert("Error occured when uploading media");
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

