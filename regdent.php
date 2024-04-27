<?php
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
    
    // Query to insert into the 'login' table
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

    // Query to insert into the 'doctors' table
    $sql2 = "INSERT INTO doctors (email) VALUES ('$username')";

    // Execute the first query
    if ($conn->query($sql) === TRUE) {
        // Execute the second query
        if ($conn->query($sql2) === TRUE) {
            // Both queries executed successfully
            header("Location: regdentsuccess.php");
        } else {
            // Error in the second query
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        // Error in the first query
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
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
      padding: 1.45vw;
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
	box-shadow: 0px 0.3vw 0.3vw 0px rgba(0, 0, 0, 0.25);
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
	box-shadow: 0px 0.3vw 0.3vw 0px rgba(0, 0, 0, 0.25);
	overflow:hidden;
	margin-left:2%;
}
.loginbut{

	clear:both;
	width:83%;
	background-color:#3498DB;
	margin: 45% auto 0 4.7%;
	height:4.2vw;
	border-style:solid;
	border-color:#3498DB;
	border-radius:0.6em;
}
.butlog{
width:100%;
height:100%;
color: white;
text-align: center;
font-family: Inter;
font-size: 1em;
font-style: normal;
font-weight: 400;
line-height: normal;
-webkit-text-stroke: 0.1vw white; /* For WebKit browsers (Chrome, Safari) */
  text-stroke:  0.1vw white; /* For other browsers */
}
.butreg{
width:100%;
height:100%;
color: white;
text-align: center;
font-family: Inter;
font-size: 1.5em;
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
font-size: 150%;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.loginbut1{

	clear:both;
	width:83%;
	background-color:#3498DB;
	margin:auto;
	height:4.2vw;
	border-style:solid;
	border-color:#3498DB;
	border-radius:0.4em;
	margin-top:8%;
}
  </style>
</head>
<body>
  <div class="fixed-resolution">
    <div class="login-container">

      </form> 
	<div class="divgods">
	<span>Golden Dental Clinic ONH Admin</span>
	</div> 
	<div class="container">
	<div class="left">
	
	<img src="usericon.png" style="width:65px; height:65px;margin-left:2.7%;float:left;">
	
	<div class="textbox"><form action="regdent.php" method="post" ><input class="uname" type="email" placeholder="E-mail" name="username" id="emailInput" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required></input>
	
<script>
document.getElementById('textInput').addEventListener('input', function(event) {
    const inputValue = event.target.value;
    const sanitizedValue = inputValue.replace(/[^A-Za-z0-9.]/g, ''); // Remove special characters
    event.target.value = sanitizedValue;
});
</script>
<script>
                                
                            </script>
	
	</div>
	<img src="passicon.png" style="width:48px; height:48px;margin-top:10%;margin-left:4.5%;clear:both;float:left;">
	<div class="textbox1"><input class="pass" type="password" placeholder="Password" name="password" id="passwordInput" maxlength="30" required></>
	
	<script>
document.getElementById('passwordInput').addEventListener('input', function(event) {
    const inputValue = event.target.value;
    const sanitizedValue = inputValue.replace(/[^A-Za-z0-9.]/g, ''); // Remove special characters
    event.target.value = sanitizedValue;
});
</script>

	</div>
	<div class="loginbut"><button type="submit" class="butreg">Register</button></div></form>
</div>
<div class="middle"></div>
	<div class="right">
		<div class="cent">Already have an account?
		<form action="logindent.php"><div class="loginbut1"><button type="submit" class="butlog">Login</button></form></div>
		</div>
		
	</div>
	</div>
    </div>
  </div>
</body>
</html>