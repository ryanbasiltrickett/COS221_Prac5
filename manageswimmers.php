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
    <div class="manageSwimmer-image">
    </div>
    <div class="credentials">
        <h1>Manage Swimmers</h1>
        <h3>Please use the below to insert, update or delete individual swimmers</h3>

        <div id="main-buttons">
            <a href="addswimmers.php"> <button id = "addSwimmer" type="button">Add Swimmer</button></a>
            <a href="updateswimmers.php"> <button id = "updateSwimmer" type="button">Update Swimmer</button></a>
            <a href="deleteswimmers.php"> <button id = "deleteSwimmer" type="button">Delete Swimmer</button></a>
        </div>
    </div>
</body>

</html>