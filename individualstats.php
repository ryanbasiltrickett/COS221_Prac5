<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Stats</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
    <script src="js/individualstats.js"></script>
</head>

<?php
    session_start();
    $_SESSION["page"] = "individualstats";
    require_once("php/header.php");
?>

<body onLoad="loadSwimmers()" id="page">
    <div class="titlediv">
        <h1>Review Statistics For An Individual Swimmer</h1>
        <h3>Choose a Swimmer</h3>

        <div class="container">

            <label>Swimmer: </label>  <br />
            <select name="swimmer" id="swimmer">
            </select>
            <button onclick="loadPB()">View</button> <br />

        </div>
    </div>

    <div class="statsarea">
        <label id="pbLabel"> </label> <br/>
        <table id ="PBs">
            
        </table> </br> </br>
        <label id="eventLabel"> </label> <br/>
        <table id ="events">
            
        </table>
    </div>
</body>

</html>