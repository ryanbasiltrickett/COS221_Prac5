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
session_start();
$_SESSION["page"] = "viewstatistics";
require_once("php/header.php");
?>

<body>
    This page will display stats for an a given events. Allow the user to select an event by name and then
    provide a list of relevant statistics: for example the 5 fastest swimmers for the event.

    Please you the viewstatistics.css file to do your css

</body>

</html>