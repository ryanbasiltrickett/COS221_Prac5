<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log results</title>
    <link rel="stylesheet" href="./css/logresults.css" />
</head>

<?php
    $_SESSION["page"] = "logresults";
    require_once("php/header.php");
?>

<body>
    <div id="Banner">
        <h1 id="mainHeading">Log Results</h1>
        <h3 id="subtitle">Please use the below to capture competition results</h3>
    </div>

    This page needs to be able to captire the following: You need to be able to specify a tournament, event, swimmer name (or id) and their time, when doing the insert, you also needs to detect if this time is a PB for the specific stroke.
    You also need to be able to capture results for an entire team by specifying the 4 swimmers, the event, the tournament and the final time. This also needs to generate a team in the teams table, it might be needed to capture data such as date depending on the final data model.

</body>

</html>