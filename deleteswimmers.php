<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
</head>

<?php
    $_SESSION["page"] = "deleteswimmers";
    require_once("php/header.php");
?>

<body>
    <div class="deleteSwimmer-image">
    </div>
    <div class="credentials">
        <h1>Delete Swimmers</h1>
        <h3>Choose the swimmer to be deleted</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                <label>Swimmer: </label> <br/>
                <select name="swimmer" id="swimmer">
                </select> <br/>
                <button onclick="deleteSwimmer()" type="submit">Delete</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>