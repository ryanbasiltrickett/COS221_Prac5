

function validateLogin(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    var error = document.getElementById("errorArea");

    if (username == "" || password == ""){
        error.innerText = "Username or password not valid";
        return false;
    } else {
        return true;
    }
}