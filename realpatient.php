<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdental";
$records_per_page = 5;

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Delete record
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM bookings WHERE booking_id = $delete_id";
    $conn->query($delete_sql);
}

$sql = "SELECT `booking_id`, `name`, `email`, `contact`, `gender`, `service`, `preferredDateTime`, `doctor_id`,`birthdate` FROM bookings 
        WHERE `booking_id` LIKE '%$search%'
        OR `name` LIKE '%$search%'
        OR `email` LIKE '%$search%'
        OR `contact` LIKE '%$search%'
		OR `birthdate` LIKE '%$search%'
        OR `gender` LIKE '%$search%'
        OR `service` LIKE '%$search%'
        OR `preferredDateTime` LIKE '%$search%'
        OR `doctor_id` LIKE '%$search%'
        LIMIT $offset, $records_per_page";

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

display:flex;
flex-direction:row;
flex-wrap:wrap;

}
.search{
width:30%;
height:10%;

display: flex;
}
.search1{
width:70%;
height:10%;
}
.containerforsearch{
	border-bottom: 1px solid #A9A9A9;
	height:41%;
	width:50%;
	margin-left:1.5%;
	margin-top:0.2%;
	
	
}
.searchinput{
	height:100%;
	width:100%;
	border-bottom: 1px solid #A9A9A9;
	border-top:none;
	border-left:none;
	border-right:none;
	outline:none;
	font-family: 'Amiri';
        font-size: 15px;
        color: black;
}
.searchinput::placeholder {
        font-family: 'Amiri', sans-serif;
        font-size: 15px;
        color: #A9A9A9;
    }
button:hover{
cursor:pointer;
}
.con{
	
	margin-left:1.5%;
	height:100%;
	width:100%;
}
.darkgreypart{
height:65px;
background-color:#EEE5E5;
width:1115px;
margin-top:-0.7%;
margin-left:auto;
margin-right:auto;
border-radius:10px;
display: flex;
    align-items: center; /* Align content vertically center */
}
.title{
width:114px;
font-family:Amiri;
font-weight: bold;
font-size:15px;
color:#3498DB;
margin-left:1.5%;
letter-spacing:0.5px;

}
.title1{
font-family:Amiri;
font-weight: bold;
font-size:15px;
color:#3498DB;
margin-left:10px;
letter-spacing:0.5px;
}
.nottitle{
font-family:Amiri;

font-size:15px;
color:black;
margin-left:10px;
letter-spacing:0px;
}
.darkgreypart{
height:65px;
background-color:#EEE5E5;
width:82vw;
margin-top:-0.7%;
margin-left:auto;
margin-right:auto;
border-radius:10px;
display: flex;
    align-items: center; /* Align content vertically center */
}
.lightgreypart{
height:65px;
background-color:#f4efef;
width:82vw;
margin-top:0.6%;
margin-left:auto;
margin-right:auto;
border-radius:10px;
display: flex;
    align-items: center; /* Align content vertically center */
}
.email{
font-size:12px;
margin-left:10px;
font-family:Amiri;
}
.nottitlefirst{
width:114px;
font-family:Amiri;

font-size:15px;
color:black;
margin-left:1.5%;
letter-spacing:0.5px;
}
.nottitlegreen{
font-family:Amiri;
font-weight:600;
font-size:15px;
color:#299F00;
margin-left:10px;
letter-spacing:0px;
}
.bottom{
position: absolute;
bottom:4.9%;
left:16.7%;

width:1099px;
height:54px;
display:flex;
flex-direction:row;
}
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Adjust the margin as needed */
}

.pagination a {
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #3498DB;
    color: #fff;
    border-radius: 5px;
    margin: 0 5px;
}

.pagination a:hover {
    background-color: #2980B9;
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
		<a href="dashdent.html"	 class="dashboard1st" id="active"><img src="dash.png" class="icons"><span class="dashtext">Dashboard</span></a>
		<a href="appdent.html"	 class="dashboard2" id="notactive"><img src="app.png" class="icons"><span class="dashtext">Appointment</span></a>
		<a href="profdent.html"	 class="dashboard3" id="notactive"><img src="profile.png" class="icons"><span class="dashtext">Profile</span></a>
		<a href="docdent.html"	 class="dashboard4" id="notactive"><img src="doc.png" class="icons"><span class="dashtext">Doctors</span></a>
		<a href="patdent.html"	 class="dashboard5" id="notactive"><img src="pat.png" class="icons"><span class="dashtext">Patients</span></a>
		<a href="logout.html"	 class="dashboard6" id="notactive"><img src="logout.png" class="logouticons"><span class="dashtextlogout">Logout</span></a>
    </div>
    <div class="right-container">
        <div class="top-section">
            <!-- Top content goes here -->
            
        </div>
        <div class="bottom-section">
            <div class="margintop">
               <span class="texts">Patient History</span>
               
			   
			   <form action='' method='get' class='search-form'>
			   <div class="container">
						<div class="search"><button type="submit" style="background-image:url(search.png);margin-left:7%;margin-top:1%;width:20px;height:20px;border:none;"></button><div class="containerforsearch"><input type="text" class="searchinput" placeholder="Search Appointment" name="search"></input></div></div>
						</form><div class="search1"></div>
						
						<div class="con"><div class="darkgreypart">
											<span class="title">Appointment #</span>
											<span class="title1" style="width:201px;">Patient</span>
											<span class="title1" style="width:145px;">Contact Number</span>
											<span class="title1" style="width:222px;">Preferred Date and Time</span>
											<span class="title1" style="width:189px;">Service/Procedure</span>
											<span class="title1" style="width:177px;">Birthdate</span>
										</div>
										
										<?php 
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo '<div class="lightgreypart">';
												echo '<span class="nottitlefirst">' . $row["booking_id"] . '</span>';
												echo '<div style="display: flex; flex-direction: column;">';
												echo '<span class="nottitle" style="width:201px; margin-top:5%;"><b>' . $row["name"] . '</b></span>';
												echo '<span class="email" style="margin-top:-4%;">' . $row["email"] . '</span>';
												echo '</div>';
												echo '<span class="nottitle" style="width:145px;">' . $row["contact"] . '</span>';
												echo '<span class="nottitlegreen" style="width:222px;">' . $row["preferredDateTime"] . '</span>';
												echo '<span class="nottitle" style="width:189px;">' . $row["service"] . '</span>';
												echo '<span class="nottitle" style="width:122px;">' . $row["birthdate"] . '</span>';
												echo "</div>";
											}
															// Pagination
                                                                $total_pages_sql = "SELECT COUNT(*) FROM bookings 
                                                                WHERE `booking_id` LIKE '%$search%'
                                                                OR `name` LIKE '%$search%'
                                                                OR `email` LIKE '%$search%'
                                                                OR `contact` LIKE '%$search%'
                                                                OR `gender` LIKE '%$search%'
                                                                OR `service` LIKE '%$search%'
                                                                OR `preferredDateTime` LIKE '%$search%'
                                                                OR `doctor_id` LIKE '%$search%'";
                                                            $total_pages_result = $conn->query($total_pages_sql);
                                                            $total_records = $total_pages_result->fetch_array()[0];
                                                            $total_pages = ceil($total_records / $records_per_page);

                                                            echo "<div class='pagination'>";
                                                            if ($current_page > 1) {
                                                            echo "<a href='?page=".($current_page - 1)."&search=$search'> < </a>";
                                                            }

                                                            if ($current_page < $total_pages) {
                                                            echo "<a href='?page=".($current_page + 1)."&search=$search'> > </a>";
                                                            }
                                                            echo "</div>";
                                                            } else {
                                                            echo "0 results";
                                                            }
                                                        
                                                            ?>
                                                        
											
											<div class="bottom">
                                                <div style="width:240px;height:54px;border-radius:5px;background-color:#3498DB; display:flex;align-items:center; justify-content:center;, margin-top:50px;">
                                                <span style="font-family:Anton; font-size:20px; color:#FFFFFF;">Create New Appointment</span>
                                            </div>
										<script>
												function deleteRecord(bookingId) {
													if (confirm("Are you sure you want to delete this record?")) {
														window.location.href = '?delete=' + bookingId;
													}
												}
											</script>
							
						
						
			   </div>			   
			   
			   
				
            </div>

			
        </div>
		
		
		
    </div>
</body>
</html>
