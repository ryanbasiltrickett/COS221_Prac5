<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/register.css" />
    <script src="./js/register.js"></script>
</head>

<body>
    <div class="login-image">

    </div>

    <div class="credentials">
        <h1>Register</h1>
        <h3>Register a SwimStat account below</h3>

        <div class="container">
            <div id="loginDetails">
                <label>Username:</label> <br />
                <input type="text" id="username" placeholder="Enter Username" required><br> <br />
                <label>Password:</label> <br />
                <input type="password" id="password" placeholder="Enter Password" required><br> <br />
                <label>Confirm Password:</label> <br />
                <input type="password" id="confirm" placeholder="Renter Password" required><br>
                <button onclick="registerUser()">Register</button>
            </div>
            <button id="loginButton" onclick="goToLogin()">Have an Account</button>
            <p id="errorArea"></p>
        </div>
    </div>
</body>

</html>