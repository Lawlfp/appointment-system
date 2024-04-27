<?php
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

$get = $_GET['doctor_id'];
$sql = "SELECT * FROM doctors WHERE doctor_id=$get";
$result = $conn->query($sql);

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
background: url(<path-to-image>), lightgray 50% / cover no-repeat;
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
}

a.back-button {
	font-family:Anton;
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    padding: 13px 49px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-left: 25px;
    margin-top: 420px;

    font-size: 25px;
    text-decoration: none; 
}

a.back-button:hover {
    background-color: #2980b9;
}


    .additional-info-container {
    background-color: #F1F5FC;
    padding-left:20px;
	padding-top:15px;
    margin-top: 27px; 
	padding-right:20px;
    border-radius: 5px;
    display: flex; 
    flex-direction: column; 
    margin-left: 14px;
    box-sizing: border-box; 
    max-width: none; 
    width: 580px; 
    height: 428px;
}
    
    .additional-info-container p {
        margin:5px;
    }

    .info-label {
        font-weight: bold;
        color: #3498DB;

		font-size:20px;
    }

    .info-value {
	
	font-size:20px;
    
    display: block; 
    margin-bottom: 10px;
    border-bottom: 1px solid #A9A9A9;
	padding-bottom:10px;
    overflow-wrap: break-word;
}
.info-value:last-child {
    border-bottom: none;
}


   
    </style>
</head>
<body>
    <div class="left-container">
        <img src="logo.png" style="width:27px; height:27px; display:block; margin:14px auto 0;">
		<span class="logotext">GOLDEN DENTAL</span>
		<div class="picture"></div>
		<span class="pictext1">Dr. Trio</span>
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
                <span class="texts">View Doctor</span>
				<?php 
					
					while ($row = $result->fetch_assoc()) {
					?>
                <form>
                    <div class="container">
                        <div class="con">
                            <div class="docbox1">
                                <div class="center"><img src="gojo.jpg" class="docpic"></div>
                                <div class="divname">
                                    <span class="docname"><?php echo $row['firstName']; echo " ";echo $row['lastName'];?></span>
                                    <span class="docname2"><?php echo $row['Expertise']; ?></span>
                                </div>
                            </div>
                    
                            <div class="additional-info-container">
        <p class="info-label">Sex</p>
        <p class="info-value"><?php echo $row['sex']; ?></p>

        <p class="info-label">Contact Number:</p>
        <p class="info-value"><?php echo $row['contactNumber'];?></p>

        <p class="info-label">Email:</p>
        <p class="info-value"><?php echo $row['email'];?></p>

        <p class="info-label">Birthdate:</p>
        <p class="info-value"><?php echo $row['birthdate'];?></p>

        <p class="info-label">Address:</p>
        <p class="info-value"><?php echo $row['address'];?></p>
		
                            </div>
                        </div>
                        <a href="doctors.php?id=<?php echo $id; ?>" class="back-button">Back</a>
<?php }?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>