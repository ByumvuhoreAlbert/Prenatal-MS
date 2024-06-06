<!---
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="date"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
        font-size: 14px;
    }
</style>
</head>
<body>
<form id="myForm" onsubmit="validateForm(event)" name="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <div id="nameError" class="error"></div>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob">
    <div id="dobError" class="error"></div>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">
    <div id="ageError" class="error"></div>

    <label for="nationalId">National ID:</label>
    <input type="text" id="nationalId" name="nationalId">
    <div id="nationalIdError" class="error"></div>

    <label for="maritalStatus">Marital Status:</label>
    <select id="maritalStatus" name="maritalStatus" >
        <option value="">Select</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
    </select>
    <div id="maritalStatusError" class="error"></div>

    <label for="partnerName">Partner's Name:</label>
    <input type="text" id="partnerName" name="partnerName">
    <div id="partnerNameError" class="error"></div>

    <label for="partnerDob">Partner's Date of Birth:</label>
    <input type="date" id="partnerDob" name="partnerDob">
    <div id="partnerDobError" class="error"></div>

    <label for="bloodGroup">Blood Group and Rhesus:</label>
    <input type="text" id="bloodGroup" name="bloodGroup">
    <div id="bloodGroupError" class="error"></div>

    <input type="submit" value="Submit" name="send">
</form>
<?php/*
echo '<script src="test.js"></script>';
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_select_db($conn,'testdb');
//$name=$dob= $age= $nationalId= $maritalStatus= $partnerName= $partnerDob= $bloodGroup="";
// Prepare and bind SQL statement

if(isset($_POST['send'])){
$name = $_POST["name"];
$dob = $_POST["dob"];
$age = $_POST["age"];
$nationalId = $_POST["nationalId"];
$maritalStatus = isset($_POST['maritalStatus']) ? htmlspecialchars($_POST['maritalStatus']) : '';
$partnerName = $_POST["partnerName"];
$partnerDob = $_POST["partnerDob"];
$bloodGroup = $_POST["bloodGroup"];

$stmt = mysqli_query($conn, "INSERT INTO identifications (name, dob, age, national_id, marital_status, partner_name, partner_dob, blood_group)
VALUES ('$name', '$dob', '$age', '$nationalId', '$maritalStatus', '$partnerName', '$partnerDob', '$bloodGroup')");


if ($stmt) {
    echo "Form data inserted successfully.";
} else {
    echo "Error: " ;
}
}


$conn->close();*/
?>
</body>
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script>
        function showPopup(userId) {
            alert("ID of last registered user: " + userId);
        }
    </script>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="" method="post" onsubmit="showPopup()">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user data into database
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$sql = "INSERT INTO testuser (name, email, password, phone) VALUES ('$name', '$email', '$password','$phone')";
if ($conn->query($sql) === TRUE) {
    // Get the ID of the last inserted record
    $last_id = $conn->insert_id;

    // Send registration ID to user's phone using Twilio API
    require_once '../vendor/autoload.php'; // Include Twilio PHP SDK

    // Your Twilio credentials
    $sid = 'AC88d5a2742e56d8382ae28b578673205c';
    $token = '3ccf90cba7cbfa963391f381eec72de2';
    $twilio_number = '+12517322255';

    $client = new Twilio\Rest\Client($sid, $token);

    $message = "Thank you for registering! Your registration ID is: $last_id";

    $client->messages->create(
        $phone, // User's phone number
        array(
            'from' => $twilio_number,
            'body' => $message
        )
    );

    echo "New record created successfully. Registration ID: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


$conn->close();
?>

</body>
</html>
