<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
</head>



<body>

    <div class="updateSwimmer-image">
    <?php
    $_SESSION["page"] = "manageswimmers";
    require_once("php/header.php");
?>
    </div>

    <div class="credentials">
            <h1>Update swimmers</h1>
            <h3>Enter the updated credentials of the swimmer</h3>

            <div class="container">
                <form method='POST' action='validate-update.php'>  
                    <label>ID Number: </label> <br/>
                    <input type="text" placeholder="Enter Swimmer ID Number" name="id" required>  <br/>
                    <label>Value of Interest: </label>  
                    <select id="changeValue">
                        <option value="FName" >First Name</option>
                        <option value="MName" >Middle Name</option>
                        <option value="LName" >Last Name</option>
                        <option value="Country" >Country</option>
                    </select>
                    <input type="text" id="option" placeholder="Enter Updated Value " name="country" required> <br/>
                    <button onclick="updateSwimmer()" type="submit">Update</button>   <br/>
                </form>                
            </div>
              
        </div>

</body>

</html>