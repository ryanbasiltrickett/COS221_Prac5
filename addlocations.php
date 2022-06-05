<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location</title>
    <link rel="stylesheet" href="./css/manageeventinfo.css" />
    <script src="js/manageeventinfo.js"></script>
</head>

<div class="manageEventInfo-image">
    <?php
        session_start();
        $_SESSION["page"] = "addlocations";
        require_once("php/header.php");
    ?>
</div>


<body>

    <div class="credentials">
        <h1>Add Location</h1>
        <h3>Enter the details of the location to be added</h3>

        <div class="container">
            <form>  
                <label> Location Name: </label> <br/>
                <input type="text" placeholder="Enter Name of location" id="location_name" required> <br/>
                <label>Timezone: </label> <br/>
                <input type="text" placeholder="Enter Time Zone Code" id="timezone" required> <br/>
                <label>Latitude: </label>   <br/>
                <input type="text" placeholder="Enter Latitude" id="latitude" required> <br/>
                <label>Longitude: </label>   <br/>
                <input type="text" placeholder="Enter Longitude" id="longitude" required> <br/>
                <label>Country Code: </label>   <br/>
                <input type="text" placeholder="Enter Country Code" id="country_code" required> <br/>
                <button onclick="addLocation()" type="submit">Add Location</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>