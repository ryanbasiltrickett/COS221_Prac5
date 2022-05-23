<?php

include_once("./database.php");

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    //this user and pass need to be validated using the USER table
    //if validation passed, redirect to main navigation page and set session variables
    //else redirect to index.html
} else { //redirect user back to index.html
    echo "<script>alert('Login failed')</script>";
    header("Location: ./index.html", true, 307);
    exit();
}
