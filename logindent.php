<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdental";


$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];
    $query = "SELECT * FROM login WHERE username = '$enteredUsername'";

    $result = $conn->query($query);


    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        if ($row["password"] == $enteredPassword) {      
			$_SESSION["logid"]=$row["id"];
            header("Location: logindentsuccess.php");
            exit(); 
        } else {
            $message = "✘ Incorrect password!";
        }
    } else {

        if (empty($enteredUsername) && empty($enteredPassword)) {
            $message = "✘ Please enter both username and password.";
        } elseif (empty($enteredPassword)) {
            $message = "✘ Please enter a password.";
        } else {
            $message = "✘ Incorrect username and password!";
        }
    }
}



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
      background-color: white; /* Set background color outside the fixed resolution to white */
    }

    .fixed-resolution {
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
	.title {
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
.popup{
color: #F00;
text-align:center;
display:block;
margin: 36px auto 0; 

font-family: Inter;
font-size: 20px;

}
  </style>
</head>
<body>
  <div class="fixed-resolution">
    <div class="login-container">
      
	<div class="divgods">
	<span class="title">Golden Dental Clinic ONH Admin</span>
	</div> 
	<div class="container">
	<div class="left">
	<img src="usericon.png" style="width:65px; height:65px;margin-left:2.7%;float:left;">
	<div class="textbox"><form action="logindent.php" method="post"><input class="uname" type="email" placeholder="E-mail" name="username" id="emailInput" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required></input></input></div>
	<img src="passicon.png" style="width:48px; height:48px;margin-top:10%;margin-left:4.5%;clear:both;float:left;">
	<div class="textbox1"><input class="pass" type="text" placeholder="Password" name="password" required></input></div>
	<div class="loginbut"><button type="submit">Login</button></div>
	<span class="popup"><?php echo $message ?></span>
	</form>
</div>
<div class="middle"></div>
	<div class="right">
		<div class="cent">Don't have an account?
		<div class="loginbut1"><form action="regdent.php"><button>Register</button></form></div>
		</div>
		
	</div>
	</div>
    </div>
  </div>
</body>
</html>