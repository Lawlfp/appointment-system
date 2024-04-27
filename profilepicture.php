<?php 
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION["id"] = $id;
    // Additional code or processing if needed
    
} else {
    // Handle the case when 'id' is not present in the URL parameters
    
}

// Check if $_SESSION["id"] is set
if (isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
    
} else {
    // Handle the case when $_SESSION["id"] is not set   
}
if (isset($_POST["id"])) {
    $id=$_POST["id"];
    
} else {
    // Handle the case when $_SESSION["id"] is not set   
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    // Process the uploaded image
    $image = file_get_contents($_FILES['image']['tmp_name']);

    // Use prepared statement to update image data in the database for a specific ID
    $stmt = $conn->prepare("UPDATE `login` SET `image`=? WHERE id=?");
$stmt->bind_param("si", $image, $id);

    if ($stmt->execute()) {
        
    } else {
        
    }

    // Close the prepared statement
    $stmt->close();
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
            background-color: #3498DB;
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
	background-color:#86CAF9;
	border-radius: 0.6em 0.6em 0 0;
}
.profpicbot{
	height:87.9%;
	width:100%;
	background-color: #86CAF9;


}
.detailstop{
	display: flex;
    align-items: center;
    justify-content: center;
    height: 100%; /* Set the height to 100% to take the full height of its parent */
    margin: 0; /* Remove any default margin */
	height:12.1%;
	width:100%;
	background-color: #3498DB;
	border-radius: 0.6em 0 0 0;
}
.detailsbot{
	height:87.9%;
	width:100%;
	background-color: #86CAF9;
	border-top-left-radius: 0.6em;
	
}
.textdetails{

	color: #FFF;
font-family: Anton;
font-size: 25px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
a{
text-decoration:none;
}
.minibox{
position:absolute;

top:38.4%;
left:37.9%;
width:24.6vw;
height:43.8vh;
flex-shrink: 0;
z-index:5;
border-radius: 10px;
background: #3498DB;
}


.imgtobeuploaded{
		margin-left:auto;
		margin-right:auto;
		
		width: 85px;
		height: 85px;
		border-radius: 85px;
		margin-top:6.6%;
		background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
}


        /* Hide the default file input text */
        input[type="file"] {
            display: none;
        }

        /* Style the "Choose File" button */
        .custom-file-upload {
			background: #D9D9D9;
			width: 271px;
			height: 50px;
			cursor: pointer;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #3498DB;
			font-family: Anton;
			font-size: 25px;
			font-style: normal;
			font-weight: 400;
			line-height: normal;
			margin: auto;
			margin-top: 11.5%;;
		}
		#uploadButton:disabled {
				opacity: 0.4;
				
			}
	
    </style>
</head>


	
<body>

    <div class="left-container">
        <img src="logo.png" style="width:27px; height:27px; display:block; margin:14px auto 0;">
		<span class="logotext">GOLDEN DENTAL</span>
		<div class="picture"></div>
		<span class="pictext1">Dr. <?php while ($row = $result->fetch_assoc()) {
										echo $row['lastName'];
										
										}
										?></span>
		<span class="pictext2">Admin</span>
		<hr></hr>
		<a href="dashdent.php?id=<?php echo $id; ?>"	 class="dashboard1st" id="active"><img src="dash.png" class="icons"><span class="dashtext">Dashboard</span></a>
		<a href="appointment1.php?id=<?php echo $id; ?>"	 class="dashboard2" id="notactive"><img src="app.png" class="icons"><span class="dashtext">Appointment</span></a>
		<a href="profiledetails.php?id=<?php echo $id; ?>"	 class="dashboard3" id="notactive"><img src="profile.png" class="icons"><span class="dashtext">Profile</span></a>
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
			   <div class="container">
						<div class="overlap-container">
								<a href="profiledetails.php?id=<?php echo $id; ?>"><div class="detailstop"><span class="textdetails">Profile Details</span></div></a>
								<div class="detailsbot"></div>
						</div>
						<div class="overlap-container1">
								<div class="profpictop"><span class="textdetails">Profile Picture</span></div>
								<div class="profpicbot">
								<div class="minibox">
														<div class="imgtobeuploaded" id="imgPreview"></div>						
														<form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post" enctype="multipart/form-data">
    <!-- Your form content -->							<input type="hidden" name="id" value="<?php echo $id; ?>">
															
															<label class="custom-file-upload" for="image"><span>Choose New Photo</span></label>
															<input type="file" name="image" id="image" accept="image/*" required onchange="validateForm()">
															<br>
															<input style="background: #D9D9D9;
															border:none;
															width: 271px;
															height: 50px;
															cursor: pointer;
															display: flex;
															justify-content: center;
															align-items: center;
															color: #3498DB;
															font-family: Anton;
															font-size: 25px;
															font-style: normal;
															font-weight: 400;
															line-height: normal;
															margin: auto;
															margin-top: 7.2%;" type="submit" value="Upload Photo" id="uploadButton" disabled>
														</form>			
														</div>
														<script>
															function previewImage() {
																var input = document.getElementById('image');
																var imgPreview = document.getElementById('imgPreview');

																if (input.files && input.files[0]) {
																	var reader = new FileReader();

																	reader.onload = function (e) {
																		imgPreview.style.backgroundImage = 'url(' + e.target.result + ')';
																	};

																	reader.readAsDataURL(input.files[0]);
																}
															}

															function validateForm() {
																var imageInput = document.getElementById('image');
																var uploadButton = document.getElementById('uploadButton');

																if (imageInput.value) {
																	uploadButton.disabled = false;
																} else {
																	uploadButton.disabled = true;
																}

																previewImage(); // Call the function to preview the selected image
															}
														</script>
								
								</div>
						</div>
						
			   </div>
            </div>

			
        </div>
		
		
		
    </div>
</body>
</html>
<?php 

?>