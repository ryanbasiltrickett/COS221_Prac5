<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/managelocations.css" />
</head>

<?php
    $_SESSION["page"] = "deleteswimmers";
    require_once("php/header.php");
?>

<body>
    <div class="deleteSwimmer-image">
    </div>
    <div class="credentials">
        <h1>Update Location</h1>
        <h3>Enter the details of the location to be updated</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                UPDATE CREDENTIALS!
            </form>                
        </div>
    </div>
</body>

</html>