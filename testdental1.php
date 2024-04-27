<!-- testdental1.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!-- Add your styling if needed -->
</head>
<body>

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

if (isset($_GET['booking_id']) && is_numeric($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    
    // Fetch details for the specific booking
    $sql = "SELECT * FROM bookings WHERE booking_id = $booking_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display details as needed
        echo "<h2>Booking Details</h2>";
        echo "<p>Booking ID: " . $row["booking_id"] . "</p>";
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        // Add other details here
    } else {
        echo "Booking not found";
    }
} else {
    echo "Invalid booking ID";
}

$conn->close();
?>

</body>
</html>
