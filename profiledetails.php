<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $cnumber = $_POST['cnumber'];
    $expertise = $_POST['expertise'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
	$id = $_POST['id'];
    // Your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbdental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the doctor's ID from the session
    

    // SQL query to update data in the 'doctors' table
    $sql = "UPDATE doctors SET 
            firstName = '$fname', 
            middleName = '$mname', 
            lastName = '$lname', 
            sex = '$sex', 
            contactNumber = '$cnumber', 
            Expertise = '$expertise', 
            email = '$email', 
            birthdate = '$birthdate', 
            address = '$address' 
            WHERE doctor_id = $id";

    if ($conn->query($sql) === TRUE) {
        
    } else {
        
    }

    
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
	
    // Your code to handle the $id when it is set
} else {
    // Your code to handle the case when 'id' is not set in the $_GET array
}
if(isset($_SESSION["id"])){
	$id=$_SESSION["id"];
	
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM doctors WHERE doctor_id=$id";
$sql2="SELECT * FROM login WHERE id=$id";
$result = $conn->query($sql);
$result1 = $conn->query($sql2);

$resultz = $conn->query("SELECT * FROM `login` WHERE id=$id");

    if ($resultz && $row = $resultz->fetch_assoc()) {
        // Set the background image URL using data URI
        $imageData = base64_encode($row['image']);
        $backgroundImageURL = 'data:image/jpeg;base64,' . $imageData;
    } else {
        $backgroundImageURL = ''; // Default to an empty string if no image is available
    }
	

$result = $conn->query($sql);

// Check if there are rows in the result set

    // Fetch and display data
  while ($row = $result->fetch_assoc())   {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split Centered Container</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }
		
        .left-container {
    width: 15%;
    height: 100%;
    background: #3498DB;
    box-shadow: 4px 0px 4px 0px rgba(0, 0, 0, 0.25);
    z-index: 2; /* Bring the left container in front */
    display: flex;
    flex-direction: column; /* Stack items vertically */
    align-items: center; /* Center items horizontally */
    
    color: white; /* Text color for better visibility */
}
		.picture{
		width: 85px;
		height: 85px;
		border-radius: 85px;
		margin-top:11px;
		background-position: center;
		background: url(<?php echo $backgroundImageURL ?>)center/cover no-repeat;
		}
		
		.pictext1{
		color: #FFF;
text-align: center;
font-family: Amiri;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
		}

        .right-container {
            width: 85%;
            height: 100%;
            display: flex;
            flex-direction: column; /* Stack top and bottom sections vertically */
        }

        .top-section {
            height: 88px;
            background: #3498DB;
            z-index: 1; /* Send the top section to the back */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bottom-section {
            flex-grow: 1; /* Allow the bottom section to grow and take remaining space */
            background-color: white;
            z-index: 1; /* Send the bottom section to the back */
            display: flex;
        }

        
		
		.logotext{
		color: #FFF;
text-align: center;
font-family: Anton;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
margin-top: -1px;
		}
		
		.pictext1{
		margin-top:5px;
		color: #FFF;
text-align: center;
font-family: Amiri;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;

		}
		.pictext2{
		color: #FFF;
text-align: center;
font-family: Amiri;
font-size: 15px;
font-style: normal;
font-weight: 400;
line-height: normal;
margin-top:-12px;
		}
		
		.margintop {
            margin-top: 17px;
        }
        .box1 {
            margin-left: 20px;
            width: 250px;
            height: 142px;
            background-color: #3498DB;
            border-radius: 10px;
            position: absolute; /* Add relative positioning */
        }

        .text {
            position: absolute; /* Change to absolute positioning */
            top: 35%;
            transform: translateY(-50%);
            color: #FFF;
            text-shadow: 0px 4px 0px rgba(0, 0, 0, 0.25);
            font-family: Anton;
            font-size: 25px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 2.5px;
            margin-left: 19px;
        }

        .text2 {
            position: absolute; /* Change to absolute positioning */
            top: 68%;
            transform: translateY(-50%);
            color: #FFF;
            text-shadow: 0px 4px 0px rgba(0, 0, 0, 0.25);
            font-family: Anton;
            font-size: 25px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 2.5px;
            margin-left: 19px;
        }

        .ellipse-wrapper {
			
            width: 160px;
            height: 144px;
            position: relative; /* Change to absolute positioning */
            filter: drop-shadow(4px 4px 0px rgba(0, 0, 0, 1));
            top: -2%; /* Adjust these values according to your layout needs */
            left: 69%;

            z-index: 3; /* Increase z-index to bring it to the front */
        }

        .ellipse-2 {
            background: #86caf9;
            border-radius: 50%;
            width: 100%;
            height: 100%;
            clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);
            z-index: 3; /* Make sure it matches the z-index of .ellipse-wrapper */
        }
		
		hr{
		background-color:white;
		width:76%;
		margin-top:9px;
		}
		/* ... Existing styles ... */
#notactive{
	border-color: #3498DB;
}
#active{
	border-color:white;
}
.dashboard1st {
text-decoration:none;
    width: 98%;
    height: 3.8%;
    margin-top: 3px;
    border-left: 5px;
    
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashboard2 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 7px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashboard3 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 1.1px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashboard3 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 1.1px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashboard4 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 2px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashboard5 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 1px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.icons {
    margin-left: 30px;
}

.dashtext {
	
    color: #FFF;
    font-family: Anton;
    font-size: 17px;

    font-weight:400;
    line-height: normal;
    margin-left: 21px; /* Add some space between icon and text */
}

.dashboard6 {
text-decoration:none;
    width: 98%;
    height: 5%;
    margin-top: 275px;
    border-left: 5px;
    border-style: solid;
    border-right: 0px;
    border-top: 0px;
    border-bottom: 0px;
    display: flex;
    align-items: center; /* Align items vertically center */
}
.dashtextlogout {
	
    color: #FF0000;
    font-family: Anton;
    font-size: 20px;

    font-weight:lighter;
    line-height: normal;
    margin-left: 21px; /* Add some space between icon and text */
}
.logouticons {
    margin-left: 32px;
}
.texts{
	
		margin-left:20px;
		margin-top:178px;
		color: #3498DB;
font-family: Anton;
font-size: 25px;
font-style: normal;
font-weight: 400;
line-height: normal;
		
}
.container{
width: 50vw	;
height: 72.3vh;

border-radius: 0.6em;
background: #3498DB;
margin-left:20.5%;
margin-top:3.5%;
display:flex;
flex-direction:row;
flex-wrap:wrap;

}
.overlap-container {
	
           
            width: 50%;
            height: 100%;/* 13.7%*/
            background-color: #86CAF9;
           border-radius: 0.6em 0.6em 0 0.6em;

            z-index: 4; /* Make sure it has a higher z-index to be on top */
        }
.overlap-container1 {
	
           
            width: 50%;
            height: 100%;
			
            border-radius: 0.6em;
			
            z-index: 4; /* Make sure it has a higher z-index to be on top */
        }
.profpictop{
	display: flex;
    align-items: center;
    justify-content: center;
    height: 100%; /* Set the height to 100% to take the full height of its parent */
    margin: 0; /* Remove any default margin */
	height:12.1%;
	width:100%;
	background-color:#3498DB;
	border-radius: 0.6em;
}
.profpicbot{
	height:87.9%;
	width:100%;
	background-color: #86CAF9;
	border-radius:0 0.6em 0.6em 0.6em;

}
.detailstop{
	display: flex;
    align-items: center;
    justify-content: center;
    height: 100%; /* Set the height to 100% to take the full height of its parent */
    margin: 0; /* Remove any default margin */
	height:12.1%;
	width:100%;
	background-color: #86CAF9;
	border-radius: 0.6em;
}
.detailsbot{
	height:87.9%;
	width:100%;
	background-color: #86CAF9;
	border-radius:0 0.6em 0.6em 0.6em;
}
.textdetails{

	color: #FFF;
font-family: Anton;
font-size: 1.6em;
font-style: normal;
font-weight: 400;
line-height: normal;
}
a{
text-decoration:none;
}
.minibox{
position:absolute;
top:34.3%;
left:27.7%;
width: 185px;
height: 52px;
z-index:5;
}
.smoltext {
    color: #FFF;
    font-family: Amiri;
    font-size: 1.25em;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    text-shadow:
        -2px -2px 0 #82A5E8,
        0px -2px 0 #82A5E8,
        2px -2px 0 #82A5E8,
        2px 0px 0 #82A5E8,
        2px 2px 0 #82A5E8,
        0px 2px 0 #82A5E8,
        -2px 2px 0 #82A5E8,
        -2px 0px 0 #82A5E8;
}

.field{
	margin-top:-5%;
	width: 13.6vw;
	height: 4vh;
	flex-shrink: 0;
	border-radius: 5px;
	background-color: #D9D9D9;
	border:none;
	padding-left:4%;
}
.minibox2{
position:absolute;
top:34.3%;
left:43.3%;
width: 185px;
height: 52px;
z-index:5;
}
.minibox3{
position:absolute;
top:34.3%;
left:59%;
width: 185px;
height: 52px;
z-index:5;
}
.minibox4{
position:absolute;
top:46%;
left:27.7%;
width: 185px;
height: 52px;
z-index:5;
}
.minibox5{
position:absolute;
top:46%;
left:43.3%;
width: 185px;
height: 52px;
z-index:5;
}

.minibox6{
position:absolute;
top:46%;
left:59%;
width: 185px;
height: 52px;
z-index:5;
}
.minibox7{
position:absolute;
top:57.7%;
left:27.7%;
width: 380px;
height: 52px;
z-index:5;
}
.field1{
	margin-top:-5%;
	width: 28.7vw;
	height: 4vh;
	flex-shrink: 0;
	border-radius: 5px;
	background-color: #D9D9D9;
	border:none;
	padding-left:4%;
	
}
.field-container {
    width: 100%;
}
.minibox8{
position:absolute;
top:69.4%;
left:27.7%;
width: 380px;
height: 52px;
z-index:5;
}

.fieldz{
	margin-top:-5%;
	width: 14.3vw;
	height: 4.3vh;
	flex-shrink: 0;
	border-radius: 5px;
	background-color: #D9D9D9;
	border:none;
	padding-left:4%;
}
.edit{
	width: 335px;
height: 63px;
flex-shrink: 0;
border-radius: 10px;
background: #3498DB;
position:absolute;
top:81.5%;
left:37.9%;

z-index:5;
text-align:center;
display: flex;
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    text-align: center;
}
.field2{
	margin-top:-5%;
	width: 44.2vw;
	height: 30px;
	flex-shrink: 0;
	border-radius: 5px;
	background-color: #D9D9D9;
	border:none;
	padding-left:4%;
	
}
.edittext{
	color: #F4EFEF;
text-align: center;
font-family: Anton;
font-size: 25px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.minibox9{
position:absolute;
top:57.7%;
left:59%;
width: 185px;
height: 52px;
z-index:5;
}
.edit-button {
    width: 100%;
    height: 100%;
    background: #3498DB; /* Add your preferred background color */
    border: none;
    border-radius: 10px;
    color: #FFF;
    font-family: Anton;
    font-size: 25px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="left-container">
        <img src="logo.png" style="width:27px; height:27px; display:block; margin:14px auto 0;">
		<span class="logotext">GOLDEN DENTAL</span>
		<div class="picture"></div>
		<span class="pictext1">Dr. <?php 
										echo $row['lastName'];
										
										
										?></span>
		<span class="pictext2">Admin</span>
		<hr></hr>
		<a href="dashdent.php?id=<?php echo $id; ?>"	 class="dashboard1st" id="notactive"><img src="dash.png" class="icons"><span class="dashtext">Dashboard</span></a>
		<a href="appointment1.php?id=<?php echo $id; ?>"	 class="dashboard2" id="notactive"><img src="app.png" class="icons"><span class="dashtext">Appointment</span></a>
		<a href="profiledetails.php?id=<?php echo $id; ?>"	 class="dashboard3" id="active"><img src="profile.png" class="icons"><span class="dashtext">Profile</span></a>
		<a href="doctors.php?id=<?php echo $id; ?>"	 class="dashboard4" id="notactive"><img src="doc.png" class="icons"><span class="dashtext">Doctors</span></a>
		<a href="patient.php?id=<?php echo $id; ?>"	 class="dashboard5" id="notactive"><img src="pat.png" class="icons"><span class="dashtext">Patients</span></a>
		<a href="logindent.php"	 class="dashboard6" id="notactive"><img src="logout.png" class="logouticons"><span class="dashtextlogout">Logout</span></a>
    </div>
    <div class="right-container">
        <div class="top-section">
            <!-- Top content goes here -->
            
        </div>
        <div class="bottom-section">
            <div class="margintop">
               <span class="texts">Profile</span>
			   <form action="profiledetails.php" method="post">
			   <div class="container">

						<div class="overlap-container">
								<div class="detailstop"><span class="textdetails">Profile Details</span></div>
								
								<div class="detailsbot"><div class="minibox"><span class="smoltext">First Name</span>
                                <input type="text" class="field" name="fname" value="<?php echo isset($row["firstName"]) ? $row["firstName"] : ''; ?>"></input>
																				
														</div>
														<div class="minibox4"><span class="smoltext">Sex</span>
																				<select id="gender" class="fieldz" name="sex" value="<?php echo $row["sex"]?>">
																				  <option value="Male">Male</option>
																				  <option value="Female">Female</option>
																				</select>
																				
															</div>
														
								</div>
						</div>
						<div class="overlap-container1">
								<a href="profilepicture.php"><div class="profpictop"><span class="textdetails">Profile Picture</span></div></a>
								<div class="profpicbot"><div class="minibox2"><span class="smoltext">Middle Name</span>
                                <input type="text" class="field" name="mname" value="<?php echo isset($row["middleName"]) ? $row["middleName"] : ''; ?>"></input>
																				
								</div>
								
								<div class="minibox3"><span class="smoltext">Last Name</span>
                                <input type="text" class="field" name="lname" value="<?php echo isset($row["lastName"]) ? $row["lastName"] : ''; ?>"></input>
																				
								</div>
								<div class="minibox5"><span class="smoltext">Contact Number</span>
                                <input type="text" class="field" maxlength="11" id="customInput" oninput="restrictInput()" name="cnumber" value="<?php echo isset($row["contactNumber"]) ? $row["contactNumber"] : ''; ?>">
								
								</div>																		
																				<script>
																				  function restrictInput() {
																					var inputElement = document.getElementById('customInput');
																					var inputValue = inputElement.value;

																					// Check if the input starts with "09" and contains only numbers
																					if (!inputValue.startsWith("09") || !/^\d+$/.test(inputValue.substring(2))) {
																					  // If not, remove any non-numeric characters
																					  inputElement.value = "09" + inputValue.substring(2).replace(/[^\d]/g, '');
																					}
																				  }
																				</script>
								<div class="minibox6"><span class="smoltext">Area of Expertise</span>
																				<select id="gender" class="fieldz" name="expertise" value="<?php echo $row["Expertise"]?>">
																				  <option value="General Dentistry">General Dentistry</option>
																				  <option value="Orthodontics">Orthodontics</option>
																				  <option value="Oral Surgery">Oral Surgery</option>
																				  <option value="Periodontics">Periodontics</option>
																				  <option value="Pediatric Dentistry">Pediatric Dentistry</option>
																				  <option value="Prosthodontics">Prosthodontics</option>
																				  <option value="Endodontics">Endodontics</option>
																				  <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
																				  <option value="Dental Public Health">Dental Public Health</option>
																				  <option value="Geriatric Dentistry">Geriatric Dentistry</option>
																				</select>
																				
								</div>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<div class="minibox7"><span class="smoltext">E-mail</span>																				
																				<div class="field-container">
                                                                                <input type="text" class="field1" name="email" value="<?php echo isset($row["email"]) ? $row["email"] : ''; ?>"></input>
																						</div>
								</div>
								<div class="minibox9"><span class="smoltext">Birthday</span>
																				<input type="date" id="birthdate" name="birthdate" max="" class="field" value="<?php echo $row["birthdate"]?>"></input>
																				
								</div>
																				<script>
																				var currentDate = new Date();
																				var maxBirthdate = new Date();
																				maxBirthdate.setFullYear(currentDate.getFullYear() - 18);

																				document.getElementById("birthdate").max = maxBirthdate.toISOString().split('T')[0];
																			</script>
								<div class="minibox8"><span class="smoltext">Address</span>																				
																				<div class="field-container">
                                                                                <input type="text" class="field2" name="address" value="<?php echo isset($row["address"]) ? $row["address"] : ''; ?>"></input>
																						</div>
								</div>
								
								<div class="edit"><button type="submit" class="edit-button"><span class="edittext">Edit Profile</span></button></div>
								</div>
						</div>
						
			   </div>
            </div>

			
        </div>
		
		</form>
		
    </div>
</body>
</html>
<?php
// Check if the form is submitted
  }
	
?>