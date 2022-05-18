<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SwimStat</title>
    <link rel="stylesheet" href="./css/index.css" />
  </head>
  <body id="BodyArea">
    <div id="Banner">
      <h1 id="mainHeading">Welcome to SwimStats!</h1>
      <h3 id="subtitle">A proud product of Team.exe</h3>
    </div>

    <div id="Mid">
      <form
        action="login.php"
        id="loginDetails"
        onsubmit="return validateLogin()"
        method="post"
      >
        Username:<input type="text" id="username" name="user" /><br /><br />
        Password:<input type="password" id="password" name="pass" /><br />
        <br />
        <input type="submit" value="Login" />
      </form>
      <p id="errorArea"></p>
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
