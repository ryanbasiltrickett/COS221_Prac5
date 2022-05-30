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

<body id="page">

    <div class="credentials">
        <h1>View fastest swimmers per event</h1>
        <h3>Choose an event</h3>

        <div class="container">
            <form method='POST'>
                <label>Event: </label> <br />
                <select name="event" id="event">
                </select> <br />
                <button>View</button> <br />
            </form>
        </div>
    </div>

    <div id="resultsArea">
        <table>
            <th>
            <td>Swimmer</td>
            <td>Time</td>
            </th>
            <tr>
                <td>Dave Sharkfin</td>
                <td>14:00</td>
            </tr>
            <tr>
                <td>Dave Sharkfin2</td>
                <td>14:00</td>
            </tr>
            <tr>
                <td>Dave Sharkfin3</td>
                <td>14:00</td>
            </tr>
            <tr>
                <td>Dave Sharkfin3</td>
                <td>14:00</td>
            </tr>
        </table>
    </div>


</body>

</html>