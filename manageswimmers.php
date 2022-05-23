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
    $_SESSION["page"] = "manageswimmers";
    require_once("php/header.php");
?>

<body>
    <div id="Banner">
        <h1 id="mainHeading">Manage swimmers</h1>
        <h3 id="subtitle">Please use the below to insert or update individual swimmers</h3>
    </div>
    <div id="gridArea">
        <div id="addSwimmerBlock">
            <form action="">
                input elements to capture details of new swimmer
            </form>
        </div>
        <div id="updateSwimmerBlock">
            input elements to capture a swimmer by name and then update attributes as needed
        </div>
    </div>



    This page need to allow a user to add swimmers to the DB or update swimmer information based on some name/id. Remember that teams are generated when scores are captured
</body>

</html>