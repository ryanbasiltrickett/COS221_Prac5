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
    $_SESSION["page"] = "viewstatistics";
    require_once("php/header.php");
?>

<body onLoad="loadUpdate()">
    <div class="individualStats-image">
        <h1>Review Statistics For An Individual Swimmer</h1>
        <div id="swimmerStats">
            <label>Swimmer: </label> 
        
            <select name="swimmer" id="swimmer" onChange="loadPB()">
            </select>
            <br/>
            <br/>
            <br/>
            <label id="pbLabel"> </label> <br/>
            <table id ="PBs">
            
            </table>
            <label id="eventLabel"> </label> <br/>
            <table id ="events">
            
            </table>
        </div>
    </div>
</body>

</html>