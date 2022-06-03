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
    <div class="tournStats-image">
        <h1>Review Tournament Statistics</h1>
        <div id="tournStats">
        <label>Tournament: </label> 
        <select name="tournament" id="tournament" onChange="loadTournaments()"></select>
        <br/>
        <br/>
        <br/>

        <label id="tournStatLabel"> </label> <br/>
        <table id="tournamentStats">
                
        </table>
    </div>
    This page will display stats for an entire tournament. Allow the user to select a tournament by name and then
    provide a list relevant stats like who won what event, what events took place etc.

    Please you the viewstatistics.css file to do your css

</body>

</html>