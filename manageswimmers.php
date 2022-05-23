<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
</head>

    <div class="manageSwimmer-image">
        <?php
        $_SESSION["page"] = "manageswimmers";
        require_once("php/header.php");
        ?>
    </div>

<body>

        <div class="credentials">
            <h1>Manage swimmers</h1>
            <h3>Please use the below to insert, update or delete individual swimmers</h3>

            <div id="main-buttons">
            <a href="addswimmers.php"> <button id = "addSwimmer" type="button">Add Swimmer</button></a>
            <a href="updateswimmers.php"> <button id = "updateSwimmer" type="button">Update Swimmer</button></a>
            <a href="deleteswimmers.php"> <button id = "deleteSwimmer" type="button">Delete Swimmer</button></a>
            </div>
            

        </div>
              

    </div>

    This page need to allow a user to add swimmers to the DB or update swimmer information based on some name/id. Remember that teams are generated when scores are captured

    

</body>

</html>