<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log results</title>
    <link rel="stylesheet" href="./css/logresult.css" />
</head>

<div class="logPersonalResults-image">
    <?php
        session_start();
        $_SESSION["page"] = "logindividual";
        require_once("php/header.php");
    ?>
</div>


<body>
    <div class="credentials">
        <h1>Log Results</h1>
        <h3>Enter result details</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                <label>Swimmer: </label>   <br/>
                <select name="swimmer" id="swimmer">
                </select> <br/>
                <label>Tournment: </label>   <br/>
                <select name="tournament" id="tournament">
                </select> <br/>
                <label>Event: </label>   <br/>
                <input type="text" placeholder="Enter Event Of Tournment " name="event"> <br/>
                <label>Time: </label>   <br/>
                <input type="text" id="time" placeholder="mm:ss:mm" name="time"> <br/>
                <button onclick="addResult()" type="submit">Add Results</button>   <br/>
            </form>                
        </div>
    </div>

    This page needs to be able to captire the following: You need to be able to specify a tournament, event, swimmer name (or id) and their time, when doing the insert, you also needs to detect if this time is a PB for the specific stroke.

</body>

</html>