<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View statistics</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
</head>

<?php
    $_SESSION["page"] = "viewstatistics";
    require_once("php/header.php");
?>

<body>
    <div id="Banner">
        <h1 id="mainHeading">View statistics</h1>
        <h3 id="subtitle">View statistics for individual swimmers and competitions</h3>
    </div>

    This page needs to produce statistics for a specific swimmer based on some name/id. Ex: list of personal bests and the associated events, maybe a list of competitions ans events they've competed in, some of the swimmer's details - you have the freedom to decide what you can get from the database.
    The page also needs to produce statistics for an entire tournament at a time - it can be stuff like the number of swimmers competing, what events took place, when did the tournament take place, a list of winners of each event - you decide what you can pull out of the DB.

</body>

</html>