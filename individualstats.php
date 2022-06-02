<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View statistics</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
    <script src="js/individualstats.js"></script>
</head>

<?php
session_start();
$_SESSION["page"] = "viewstatistics";
require_once("php/header.php");
?>

<body onLoad="loadUpdate()">
    This page will display stats for an individual swimmer. Allow the user to select a swimmer by name and then
    provide a list of relevant statistics for them (ex: PBs per event).

    Please you the viewstatistics.css file to do your css

    <label>Swimmer: </label> <br/>
    <select name="swimmer" id="swimmer" onChange="loadPB()">
    </select>

    <table id ="PBs">
    
    </table>

    <table id ="PBs">
    
    </table>

</body>

</html>