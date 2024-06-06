<?php
session_start();
if (!isset($_SESSION['user-type']) && $_SESSION['user_name'] =='') {
    header("Location: ../index.php");
    exit();
}
$userType = $_SESSION['user-type'];
$username = $_SESSION['user_name'];
$hospital = $_SESSION['hospital'];
$health = $_SESSION['health'];

?>
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select nurse data
$sql = "SELECT name, email, phone, Hospital, HealtCare, password FROM nurse WHERE name = ?";

// Assuming nurse_id is a unique identifier for each nurse, replace '1' with the nurse's actual ID
$nurse_id = 1;

// Prepare and execute the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $username);
$stmt->execute();
$stmt->store_result();

// Bind the results
$stmt->bind_result($name, $email, $phone, $hospital, $healthcare, $password);

// Fetch the data
$stmt->fetch();

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
    </div>
    <div class="form-group">
        <label for="hospital">Hospital:</label>
        <input type="text" class="form-control" id="hospital" name="hospital" value="<?php echo $hospital; ?>" required>
    </div>
    <div class="form-group">
        <label for="healthcare">Healthcare:</label>
        <input type="text" class="form-control" id="healthcare" name="healthcare" value="<?php echo $healthcare; ?>" required>
    </div>
    <div class="mb-3">
    <label for="profile_photo" class="form-label">Profile Photo:</label>
    <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
</div>

    <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'prenatal_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $hospital = $_POST['hospital'];
    $healthcare = $_POST['healthcare'];

    // Check if a file is uploaded
    if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_photo']['tmp_name'];
        $fileName = $_FILES['profile_photo']['name'];
        $fileSize = $_FILES['profile_photo']['size'];
        $fileType = $_FILES['profile_photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Valid image extensions
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

        // Check if the uploaded file has a valid extension
        if (in_array($fileExtension, $allowedExtensions)) {
            // Upload directory
            $uploadDir = 'uploads/';

            // Create the uploads directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Set a unique filename
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            // Move the uploaded file to the upload directory
            $destPath = $uploadDir . $newFileName;
            if(move_uploaded_file($fileTmpPath, $destPath)) {
                // Update the nurse's profile photo path in the database
                $sqlUpdatePhoto = "UPDATE nurse SET profile = ? WHERE name = ?";
                $stmtUpdatePhoto = $conn->prepare($sqlUpdatePhoto);
                $stmtUpdatePhoto->bind_param("ss", $destPath, $username);
                $stmtUpdatePhoto->execute();
                $stmtUpdatePhoto->close();
            }
        }
    }

    // Update nurse's information
    $sqlUpdate = "UPDATE nurse SET name = ?, email = ?, phone = ?, Hospital = ?, HealtCare = ? WHERE name = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssssss", $name, $email, $phone, $hospital, $healthcare, $username);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Close the connection
    $conn->close();
}
?>


    </div>
  </body>
</html>
