<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Locations</title>
    <link rel="stylesheet" href="./css/managelocation.css" />
</head>


    <div class="manageLocation-image">
        <?php
            $_SESSION["page"] = "managelocations";
            require_once("php/header.php");
        ?>
    </div>

<body>
    <div class="credentials">
        <h1>Manage Locations</h1>
        <h3>Please use the below to insert or update tournament locations</h3>

        <div id="main-buttons">
            <a href="addlocations.php"> <button id = "addLocation" type="button">Add Location</button></a>
            <a href="updatelocations.php"> <button id = "updateLocation" type="button">Update Location</button></a>
        </div>
    </div>    
    You need to be able to add locations and update location details on this page. Tournments have links to locations so you might have to think about foreign keys
</body>

</html>