

function validateLogin(){
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    
    if (username == "" || password == "")
        return;

    var error = document.getElementById("errorArea");

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
       // console.log(this.response);
        var data = JSON.parse(this.response);

        if (data.status == "success"){
            location.href = "./manageswimmers.php";
        } else {
            error.innerText = "Username or password invalid"
        }
    }

    params = {
        "function": "login",
        "username": username,
        "password": password
    };
    
    strParams = JSON.stringify(params);
    
    xhttp.open("POST", "./php/database.php", false);
    xhttp.send(strParams);
}


function goToRegister(){
    location.href = "./register.php";
}