<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdental";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id="18";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    // Process the uploaded image
    $image = file_get_contents($_FILES['image']['tmp_name']);

    // Use prepared statement to update image data in the database for a specific ID
    $stmt = $conn->prepare("UPDATE `login` SET `image`=? WHERE id=?");
    $stmt->bind_param("si", $image, $id);

    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error updating image: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Display a form to upload an image
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        .blueback {
            width: 200px;
            height: 200px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .imgtobeuploaded {
            width: 75px;
            height: 75px;
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
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
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
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label class="custom-file-upload" for="image">Choose Image</label>
        <input type="file" name="image" id="image" accept="image/*" required onchange="validateForm()">
        <br>
        <input type="submit" value="Upload" id="uploadButton" disabled>
    </form>

    <?php
    // Display the uploaded image
    $result = $conn->query("SELECT * FROM `login` WHERE id=$id ");

    if ($result && $row = $result->fetch_assoc()) {
        // Set the background image URL using data URI
        $imageData = base64_encode($row['image']);
        $backgroundImageURL = 'data:image/jpeg;base64,' . $imageData;
    } else {
        $backgroundImageURL = ''; // Default to an empty string if no image is available
    }
    ?>
    <div class="imgtobeuploaded" id="imgPreview"></div>
    <div class="blueback" style="background-image: url('<?php echo $backgroundImageURL; ?>');">
        <input type="text">
        <input type="text">
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
