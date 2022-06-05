function registerUser(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirm = document.getElementById("confirm").value;

    var error = document.getElementById("errorArea");

    if (password != confirm){
        error.innerText = "Passwords do not match";
        return;
    }


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
         var data = JSON.parse(this.response);
 
         if (data.status == "success"){
             alert("Successfully Registered");
             location.href = "./login.php";
         } else {
             error.innerText = "Username or password invalid for registration"
         }
     }

    params = {
        "function": "register",
        "username": username,
        "password": password
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}

function goToLogin() {
    location.href = "./login.php";
}