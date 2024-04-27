<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .pagination a {
            padding: 8px;
            text-decoration: none;
            color: #000;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .delete-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
		.ellipsis-btn {
            background-color: #ccc;
            color: #000;
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .options-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px;
            z-index: 1;
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

$sql = "SELECT `booking_id`, `name`, `email`, `contact`, `gender`, `service`, `preferredDateTime`, `doctor_id` FROM bookings 
        WHERE `booking_id` LIKE '%$search%'
        OR `name` LIKE '%$search%'
        OR `email` LIKE '%$search%'
        OR `contact` LIKE '%$search%'
        OR `gender` LIKE '%$search%'
        OR `service` LIKE '%$search%'
        OR `preferredDateTime` LIKE '%$search%'
        OR `doctor_id` LIKE '%$search%'
        LIMIT $offset, $records_per_page";

$result = $conn->query($sql);

// Output search form
echo "<form action='' method='get' class='search-form'>";
echo "<input type='text' name='search' placeholder='Search...'>";
echo "<input type='submit' value='Search'>";
echo "</form>";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Booking ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Gender</th><th>Service</th><th>Preferred Date and Time</th><th>Doctor ID</th><th>Action</th></tr>";
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["booking_id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["gender"]."</td><td>".$row["service"]."</td><td>".$row["preferredDateTime"]."</td><td>".$row["doctor_id"]."</td>";
    
    // Updated button with ellipsis and options menu
    echo "<td>";
    echo "<div class='ellipsis-btn' onclick='showOptions(".$row["booking_id"].")'>&#8942;</div>";
    echo "<div id='options-menu-" . $row["booking_id"] . "' class='options-menu'>";
    echo "<a href='#' onclick='viewRecord(".$row["booking_id"].")'>View</a>";
    echo "<a href='#' onclick='deleteRecord(".$row["booking_id"].")'>Delete</a>";
    echo "</div>";
    echo "</td>";
    
    echo "</tr>";
}

    echo "</table>";

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
        echo "<a href='?page=".($current_page - 1)."&search=$search'>Previous</a>";
    }

    if ($current_page < $total_pages) {
        echo "<a href='?page=".($current_page + 1)."&search=$search'>Next</a>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    function deleteRecord(bookingId) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = '?delete=' + bookingId;
        }
    }

    function viewRecord(bookingId) {
        // Implement your logic to view the record here
        alert("Viewing record: " + bookingId);
    }

    function showOptions(bookingId) {
        var optionsMenu = document.getElementById('options-menu-' + bookingId);
        optionsMenu.style.display = (optionsMenu.style.display === 'block') ? 'none' : 'block';
    }
</script>

</body>
</html>
