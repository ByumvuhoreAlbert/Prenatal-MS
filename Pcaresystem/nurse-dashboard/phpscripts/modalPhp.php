<!DOCTYPE html>
<html lang="en">
<?php
$lmp = '2023-04-15';
$edd = date('Y-m-d', strtotime($lmp . ' +7 days +9 months'));
echo "Last Menstrual Period: $lmp\n";
echo "Expected Delivery Date: $edd";

 ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pregnant Registration Form</title>
  <style>
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CE46A;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45C959;
    }
  </style>
</head>
<body>

<h2>Pregnant Registration Form</h2>
<form method="post">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone Number</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" required>

    <label for="address">Address</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <label for="dueDate">Due Date</label>
    <input type="date" id="dueDate" name="dueDate" required>

    <label for="regDate">Registration Date</label>
    <input type="date" id="regDate" name="regDate" required>

    <label for="gender">Gender</label>
    <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="other">Other</option>
    </select>

    <label for="healthConditions">Any Existing Health Conditions</label>
    <textarea id="healthConditions" name="healthConditions" rows="4"></textarea>

    <input type="submit" value="Submit" name="submit">

    <label for="lmp">Last Menstrual Period</label>
<input type="date" id="lmp" name="lmp" required>

<label for="dueDate">Due Date</label>
<input type="date" id="dueDates" name="dueDates" onclick="calculateEDD()" required>
</form>
<?php
include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $dueDate = $_POST['dueDate'];
    $regDate = $_POST['regDate'];
    $gender = $_POST['gender'];
    $healthConditions = $_POST['healthConditions'];

    // Calculate pregnant days (assuming registration date is today)
    $registrationDate = date('Y-m-d'); // Current date
    $currentDate = date('Y-m-d'); // Current date
    $daysSinceRegistration = floor((strtotime($currentDate) - strtotime($regDate)) / (60 * 60 * 24)); // Days since registration
    $pregnantDays = min(280, $daysSinceRegistration); // Limit to a maximum of 280 days

    // Insert data into the table
    $query = "INSERT INTO pregnant_registration (fullname, email, phone, dob, address, due_date, reg_date, gender, health_conditions, pregnant_days)
              VALUES ('$fullname', '$email', '$phone', '$dob', '$address', '$dueDate', '$regDate', '$gender', '$healthConditions', '$pregnantDays')";
     $result = mysqli_query($conn, $query);
    if ($result === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}
?>
<script type="text/javascript">
function calculateEDD() {
    var lmpInput = document.getElementById('lmp');
    var lmp = new Date(lmpInput.value);
    var edd = new Date(lmp.getTime() + (7 * 24 * 60 * 60 * 1000) + (9 * 28 * 24 * 60 * 60 * 1000));
    var eddInput = document.getElementById('dueDates');
    eddInput.value = edd.toISOString().slice(0, 10);
}
</script>
</body>
</html>
