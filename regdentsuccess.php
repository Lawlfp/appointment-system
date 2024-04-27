<?php
/*
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdental";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];
	 $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
	 if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
  <title>Login Page</title>
  <style>
    body {
	
      margin: 0;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: white;

    }

    .fixed-resolution {
	filter:brightness(60%);
	background-color:#3498DB;
      width: 1366px;
      height: 768px;
      border: 1px solid #000; /* Optional: Add border for visualization */
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 67.5%;
      height:73%;
      padding: 20px;
      background-color: #fff; /* Set background color of the login window to white */
      border-radius:1.3em; /* Optional: Add border radius for a rounded look */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Optional: Add box shadow for a subtle depth effect */
    }

    /* Optional: Style the login form elements */
    .login-container h1 {
      text-align: center;
    }

    .login-container label {
      display: block;
      margin-bottom: 8px;
    }

    .login-container input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
	span {
  display: block;
  text-align: center;
  font-size: 300%;
  margin-top: 7.5%;

  font-family: Inter;
 
  color: #3498DB;
  /* Add text stroke */
  -webkit-text-stroke: 0.1vw #3498DB; /* For WebKit browsers (Chrome, Safari) */
  text-stroke:  0.1vw #3498DB; /* For other browsers */
}

.divgods{
background-color:white;
width:100%;
height:26.4%;
}
.container{
flex-direction:row-reverse;
height:35.7%;
display:flex;

}
.left {

      flex: 1;
	padding-left:0.4%;
      
    }

    .right {

      flex: 1;
    }
.textbox{
	border-style:solid;
	border-color: #3498DB;
	border-width:0.36em;
	width:67.9%;
	height:15.3%;
	margin-top:2.5%;
	border-radius:1.2em;
	float:left;
	box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
	overflow:hidden;
}
.uname{
	margin-left:3%;
	border: none;
    outline: none;
	
}
.pass{
	margin-left:3%;
	border: none;
    outline: none;

}
.textbox1{
	border-style:solid;
	border-color: #3498DB;
	border-width:0.36em;
	width:67.9%;
	height:15.3%;
	margin-top:10.5%;
	border-radius:1.2em;
	float:left;
	box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
	overflow:hidden;
	margin-left:2%;
}
.loginbut{

	clear:both;
	width:83%;
	background-color:#3498DB;
	margin: 45% auto 0 4.7%;
	height:57px;
	border-style:solid;
	border-color:#3498DB;
	border-radius:10px;
}
button{
width:100%;
height:100%;
color: white;
text-align: center;
font-family: Inter;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
-webkit-text-stroke: 0.1vw white; /* For WebKit browsers (Chrome, Safari) */
  text-stroke:  0.1vw white; /* For other browsers */
}
.middle {
		margin-left:0.5%;
		margin-top:3%;
      border-left: 3px solid #3498DB; /* Add a border to create a vertical line */
      height: 100%;
    }
	
.cent{
margin: 13% auto 0 2%;

	color: #3498DB;
text-align: center;
font-family: Inter;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.loginbut1{

	clear:both;
	width:83%;
	background-color:#3498DB;
	margin:auto;
	height:57px;
	border-style:solid;
	border-color:#3498DB;
	border-radius:10px;
	margin-top:8%;
}
.overlay-window {
            position: fixed;
            margin:auto;
            width: 533px;
            height: 381px;
            background-color: white;
            opacity: 1; /* Set brightness to 100% */
            z-index: 9999; /* Ensure the overlay is on top */
			border-radius:20px;
        }
.message{
color: #3498DB;
text-align: center;
font-family: Inter;
font-size: 36px;
margin-top:11px;
font-weight:400;
letter-spacing:0.8px;

}
.rectangle {
  width: 305px;
  height: 54.2px;
  background-color: #3498DB;
  margin-top: 89px;
  margin-left: auto;
  margin-right: auto;
  border-radius:10px;
}
.buttonok {
    color: white;
    background-color: rgba(52, 152, 219, 0); /* Use rgba for transparency, adjust values as needed */
    border: none;
    outline: none;
	
}

  </style>
</head>
<body>
<div class="overlay-window">
<img src="checkicon.png" style="height:100px; width:100px; display:block; margin:auto; margin-top:33px;">
<span class="message">Register Successful!</span>

<form action="logindent.php"><div class="rectangle"><button class="buttonok" type="submit">OK</button></div></form>
</div>

  <div class="fixed-resolution">
    <div class="login-container">

      
	<div class="divgods">
	<span>Golden Dental Clinic ONH Admin</span>
	</div> 
	<div class="container">
	<div class="left">
	
	<img src="usericon.png" style="width:65px; height:65px;margin-left:2.7%;float:left;">
	
	<div class="textbox"><form action="regdent.php" method="post"><input class="uname" type="text" placeholder="E-mail" name="username"/></div>
	<img src="passicon.png" style="width:48px; height:48px;margin-top:10%;margin-left:4.5%;clear:both;float:left;">
	<div class="textbox1"><input class="pass" type="password" placeholder="Password" name="password"/></div>
	<div class="loginbut"><button type="submit">Register</button></div></form>
</div>
<div class="middle"></div>
	<div class="right">
		<div class="cent">Already have an account?
		<form action="logindent.html"><div class="loginbut1"><button type="submit">Login</button></form></div>
		</div>
		
	</div>
	</div>
    </div>
  </div>
</body>
</html>