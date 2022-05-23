<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SwimStat</title>
  <link rel="stylesheet" href="./css/logins.css" />
</head>

<body id="BodyArea">

  <div class="login-image">
            
  </div>

  <div class="credentials">
            <h1>Login</h1>
            <h3>Enter your login details</h3>

            <div class="container">
                <form method='POST' onsubmit="return validateLogin()" action='validate-login.php' id="loginDetails">  
                    <label>Username: </label>   <br/>
                    <input type="text" placeholder="Enter Username" id="username" name="user" required> <br/> <br/>
                    <label>Password: </label> <br/>
                    <input type="password" placeholder="Enter Password" name="password" required>  <br/>
                    <button onclick="validateLogin()" type="submit">Login</button>   <br/>
                </form>
                <p id="errorArea"></p>
                <button id="registerButton">Register an account</button>
                
            </div>
              
  </div>

  <div id="Footer">
    <p id="Credits">
      Brought to you by:<br /> Mr. Thomas Blendulf - u21446131 <br />Miss.
      Jessica Dixie - u21430502 <br />Mr. Luke Lawson - u21433811 <br />
      Mr. Paul Pilane - u21448150 <br />Mr. Ryan Trickett - u21431885 <br />
      Mr. Azola Lukhozi - u21535869 <br />
      Mr. Simphiwe Nonabe - u21488275
    </p>
  </div>

  <script src="./js/validateLogin.js"></script>
</body>

</html>