<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location</title>
    <link rel="stylesheet" href="./css/managelocation.css" />
    <script src="js/managelocations.js"></script>
</head>

<div class="updateLocation-image">
    <?php
        session_start();
        $_SESSION["page"] = "updateswimmers";
        require_once("php/header.php");
    ?>
</div>


<body>

    <div class="credentials">
        <h1>Add Location</h1>
        <h3>Enter the details of the location to be added</h3>

        <div class="container">
            <form method='POST' action='validate-update.php'>  
                <label>Timezone: </label> <br/>
                <input type="text" placeholder="Enter Time Zone Code" name="timezone" required> <br/>
                <label>Latitude: </label>   <br/>
                <input type="text" placeholder="Enter Latitude" name="latitude" required> <br/>
                <label>Longitude: </label>   <br/>
                <input type="text" placeholder="Enter Longitude" name="longitude"> <br/>
                <label>Country Code: </label>   <br/>
                <input type="text" placeholder="Enter Country Code" name="country_code" required> <br/>
                <button onclick="updateLocation()" type="submit">Add Location</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>