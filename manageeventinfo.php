<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Locations</title>
    <link rel="stylesheet" href="./css/manageeventinfo.css" />
</head>


    <div class="manageLocation-image">
        <?php
            session_start();
            $_SESSION["page"] = "manageeventinfo";
            require_once("php/header.php");
        ?>
    </div>

<body>
    <div class="credentials">
        <h1>Manage Event Information</h1>
        <h3>Please use the below to insert or update locations and tournaments</h3>

        <div id="main-buttons">
            <a href="addlocations.php"> <button id = "addLocation" type="button">Add Location</button></a>
            <a href="updatelocations.php"> <button id = "updateLocation" type="button">Update Location</button></a>
            <a href="addtournaments.php"> <button id = "addTournament" type="button">Add Tournament</button></a>
            <a href="updatetournaments.php"> <button id = "updateTournament" type="button">Update Tournament</button></a>
        </div>
    </div>    
</body>

</html>