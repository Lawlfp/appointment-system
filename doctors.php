<?php

session_start();
if(isset($_GET['id'])){
$id = $_GET['id'];

$_SESSION["id"]=$id;
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


if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM doctors WHERE doctor_id = $delete_id";
    $conn->query($delete_sql);
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
		@import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap');
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
    position:fixed;
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
			margin-left: 15%;
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
width: 84.5vw;
height: 72.3vh;
margin-top:1.5%;
border-radius: 0.6em;



}

.con{
	display:flex;
	flex-direction:row;
	margin-left:1.5%;
	height:30%;
	width:100%;

	
}
.docbox1{
	display:flex;
	flex-direction:row;
	width:26.7vw;
	height:19.9vh;
	background-color:#F1F5FC;
	border-radius:5px;
	margin-top:2.4%;
	margin-left:0.6%;
}
.docbox2{
display:flex;
	flex-direction:row;
	width:26.7vw;
	height:19.9vh;
	background-color:#F1F5FC;
	border-radius:5px;
	margin-top:2.4%;
	margin-left:1.35%;
}
.docpic{
margin-left:16%;
width:6.3vw;
height:11.1vh;
border-radius:50%;
}
.center{
display: flex;
  align-items: center;
}
.divname{
margin-top:13.3%;
	margin-left:10.8%;
	display: flex;
    flex-direction: column;
}
.docname{
	
	font-family:Amiri;
	font-size:1.47vw;
	
}
.docname2{	
	font-family:Amiri;
	font-size:1.1vw;
	color:#A9A9A9;
	margin-top:-8%;
}
.ellipsis{
width:1.5vw;
height:2.6vh;
margin-left:5.6vw;
cursor: pointer;
}
.options-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px;
            z-index: 1;
			margin-left:4%;
			margin-top:8%;
        }

        .options-menu a {
            display: block;
            padding: 5px;
            text-decoration: none;
            color: #000;
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
		<a href="dashdent.php?id=<?php echo $id; ?>"	 class="dashboard1st" id="notactive"><img src="dash.png" class="icons"><span class="dashtext">Dashboard</span></a>
		<a href="appointment.php?id=<?php echo $id; ?>"	 class="dashboard2" id="notactive"><img src="app.png" class="icons"><span class="dashtext">Appointment</span></a>
		<a href="profiledetails.php?id=<?php echo $id; ?>"	 class="dashboard3" id="notactive"><img src="profile.png" class="icons"><span class="dashtext">Profile</span></a>
		<a href="doctors.php?id=<?php echo $id; ?>"	 class="dashboard4" id="active"><img src="doc.png" class="icons"><span class="dashtext">Doctors</span></a>
		<a href="patient.php?id=<?php echo $id; ?>"	 class="dashboard5" id="notactive"><img src="pat.png" class="icons"><span class="dashtext">Patients</span></a>
		<a href="logindent.php"	 class="dashboard6" id="notactive"><img src="logout.png" class="logouticons"><span class="dashtextlogout">Logout</span></a>
    </div>
    <div class="right-container">
        <div class="top-section">
            <!-- Top content goes here -->
            
        </div>
        <div class="bottom-section">
            <div class="margintop">
               <span class="texts">Doctors</span>
			   <form>
			   <div class="container">
						
						<div class="con">
						<?php
						$sql = "SELECT * FROM doctors";
                            $result = $conn->query($sql);
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $boxClass = ($counter % 3 == 1) ? 'docbox1' : 'docbox2';
        ?>
        <div class="<?php echo $boxClass; ?>">
            <div class="center"><img src="watson.jpg" class="docpic"></div>
            <div class="divname">
                <span class="docname"><?php echo $row['firstName']; echo " ";echo $row['lastName'];?></span>
                <span class="docname2"><?php echo $row['Expertise']; ?></span>
            </div>
            <div class="center">
				<?php echo "<img src='ellipsis.png' class='ellipsis' onclick='showOptions(".$row["doctor_id"].")'>";
					  echo "<div id='options-menu-" . $row["doctor_id"] . "' class='options-menu'>";
					  echo "<a href='#' onclick='viewRecord(".$row["doctor_id"].")'>View</a>";
					  echo "<a href='#' onclick='deleteRecord(".$row["doctor_id"].")'>Delete</a>";
					  echo "</div>";
				?>
</div>
        </div>
        <?php
        if ($counter % 3 == 0) {
            // Start a new 'con' after every third box
            echo '</div><div class="con">';
        }
        $counter++;
    }
    ?>
						
			   </div>			   
			   
			   
				
            </div>

			
        </div>
		
<script>
    function deleteRecord(doctorId) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = '?id=<?php echo $id; ?>&delete=' + doctorId;
        }
    }

    function viewRecord(doctorId) {
        // Redirect to viewdoctors.php with the doctor_id parameter
        window.location.href = 'viewdoctors.php?doctor_id=' + doctorId;
    }

    function showOptions(doctorId) {
        var optionsMenu = document.getElementById('options-menu-' + doctorId);
        optionsMenu.style.display = (optionsMenu.style.display === 'block') ? 'none' : 'block';
    }
</script>

		
    </div>
</body>
</html>
