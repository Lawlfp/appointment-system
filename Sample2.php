<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "sample";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());    
}
echo "Connected successfully";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["submit"])){
$fname=$_POST["fname"];
$lname=$_POST["lname"];

$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;

$sql="INSERT INTO sampletbl(fname,lname) values ('$fname','$lname')";

if(mysqli_query($conn,$sql)){
	echo"Success";
}}

}
?>

<html>
<head><title>sample</title></head>
<body>
<form method="post">
<label>First Name</label><input type="text" name="fname"></input>
<label>Last Name</label><input type="text" name="lname"></input>
<input type="submit" value="submit" name="sub"></input>
</form>
</body>
</html>
