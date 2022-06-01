<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log results</title>
    <link rel="stylesheet" href="./css/logresult.css" />
</head>

<div class="logResults-image">
    <?php
    session_start();
    $_SESSION["page"] = "logresults";
    require_once("php/header.php");
    ?>
</div>


<body>

    <div class="credentials">
        <h1>Log Results</h1>
        <h3>Please log results for individual swimmers or team</h3>

        <div id="main-buttons">
            <a href="logindividual.php"> <button id="logPersonal" type="button">Individual Swimmer</button></a> <br>
            <a href="logteam.php"> <button id="logTeam" type="button">Team</button></a>
        </div>
    </div>
    <div id="test">
        This is a test
    </div>
</body>

</html>