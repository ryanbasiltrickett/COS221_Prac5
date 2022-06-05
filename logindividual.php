<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Individual Results</title>
    <link rel="stylesheet" href="./css/logresult.css" />
    <script src="js/logresults.js"></script>
</head>

<div class="logResults-image">
    <?php
        session_start();
        $_SESSION["page"] = "logindividual";
        require_once("php/header.php");
    ?>
</div>


<body onLoad="loadIndividualPage()">
    <div class="credentials">
        <h1>Log Results</h1>
        <h3>Enter result details</h3>

        <div class="container">
            <form>  
                <label>Swimmer: </label>   <br/>
                <select name="swimmer" id="swimmer">
                </select> <br/>
                <label>Tournment: </label>   <br/>
                <select name="tournament" id="tournament">
                </select> <br/>
                <label>Event: </label>   <br/>
                <select name="event" id="event">
                </select> <br/>
                <label>Swimming Lane: </label>   <br/>
                <select name="lane" id="lane">
                </select> <br/>
                <label>Event Phase: </label>   <br/>
                <input type="text" placeholder="Enter Event Phase Of Tournment " name="event"> <br/>
                <label>Time: </label>   <br/>
                <input type="text" id="time" placeholder="mm:ss:mm" name="time"> <br/>
                <button onclick="addIndividualResult()" type="submit">Add Results</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>