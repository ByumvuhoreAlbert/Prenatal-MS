<?php
// Set the default timezone to avoid any timezone-related issues
date_default_timezone_set('Africa/Kigali');

// Current date
$date = date('d-m-Y');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['send'])) {

    // Function to sanitize input data
    function sanitize($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Sanitize POST data
    $hospital = sanitize($_POST['hospital']);
    $healthCenter = sanitize($_POST['health-center']);
    $healthPost = sanitize($_POST['health-post']);
    $name = sanitize($_POST['name']);
    $dob = sanitize($_POST['dob']);
    $age = sanitize($_POST['age']);
    $maritalStatus = isset($_POST['maritalStatus']) ? sanitize($_POST['maritalStatus']) : '';
    $partnerName = sanitize($_POST['partnerName']);
    $partnerAge = sanitize($_POST['partnerAge']);
    $employment = sanitize($_POST['employment']);
    $bloodGroup = sanitize($_POST['bloodGroup']);
    $PhoneNumber = sanitize($_POST['phoneNumber']);
    $ContactNumber = sanitize($_POST['contactNumber']);
    $education = sanitize($_POST['education']);
    $ubudehe = isset($_POST['ubudehe']) ? sanitize($_POST['ubudehe']) : '';
    $religion = sanitize($_POST['religion']);
    $accompaniedBy = isset($_POST['accompaniedBy']) ? sanitize($_POST['accompaniedBy']) : '';
    $province = isset($_POST['province']) ? sanitize($_POST['province']) : '';
    $district = isset($_POST['district']) ? sanitize($_POST['district']) : '';
    $sector = isset($_POST['sector']) ? sanitize($_POST['sector']) : '';
    $cell = isset($_POST['cell']) ? sanitize($_POST['cell']) : '';
    $village = isset($_POST['village']) ? sanitize($_POST['village']) : '';
    $gravida = isset($_POST['gravida']) ? sanitize($_POST['gravida']) : '';
    $lmpd = sanitize($_POST['lmpd']);
    $edd = sanitize($_POST['edd']);

    // Build SQL query based on gravida value
    if ($gravida !== "G1") {
        $termDeliveries = isset($_POST['termDeliveries']) ? sanitize($_POST['termDeliveries']) : '';
        $prematureDeliveries = isset($_POST['prematureDeliveries']) ? sanitize($_POST['prematureDeliveries']) : '';
        $numAbortions = sanitize($_POST['numAbortions']);
        $parity = isset($_POST['parity']) ? sanitize($_POST['parity']) : '';
        $ageLastBorn = sanitize($_POST['ageLastBorn']);
        $aliveChildren = sanitize($_POST['aliveChildren']);

        $query = "INSERT INTO pregnant (regNo, hospital, healthCenter, healthPost, name, dob, age, MaritalStatus, partnerName, partnerAge, employment, bloodGroup, PhoneNumber, ContactNumber, education, ubudehe, religion, accompany, province, district, sector, cell, village, gravida, termDelivery, prematureDelivery, numAbortions, parity, AgeLastBorn, AliveChildren, lmpd, edd, registed_date, pregnant_status)
        VALUES ('','$hospital', '$healthCenter', '$healthPost', '$name', '$dob', '$age','$maritalStatus', '$partnerName', '$partnerAge', '$employment', '$bloodGroup', '$PhoneNumber', '$ContactNumber', '$education', '$ubudehe', '$religion', '$accompaniedBy', '$province', '$district', '$sector', '$cell', '$village', '$gravida', '$termDeliveries', '$prematureDeliveries', '$numAbortions', '$parity', '$ageLastBorn', '$aliveChildren', '$lmpd', '$edd', NOW(), 'Progress')";
    } else {
        $query = "INSERT INTO pregnant (regNo, hospital, healthCenter, healthPost, name, dob, age, MaritalStatus, partnerName, partnerAge, employment, bloodGroup, PhoneNumber, ContactNumber, education, ubudehe, religion, accompany, province, district, sector, cell, village, gravida, termDelivery, prematureDelivery, numAbortions, parity, AgeLastBorn, AliveChildren, lmpd, edd, registed_date, pregnant_status)
VALUES ('','$hospital', '$healthCenter', '$healthPost', '$name', '$dob', '$age','$maritalStatus', '$partnerName', '$partnerAge', '$employment', '$bloodGroup', '$PhoneNumber', '$ContactNumber', '$education', '$ubudehe', '$religion', '$accompaniedBy', '$province', '$district', '$sector', '$cell', '$village', '$gravida', 'Null', 'Null', '0', 'Null', '0', '0', '$lmpd', '$edd', NOW(), 'Progress')";
    }

    if ($conn->query($query) === TRUE) {
        $last_id = $conn->insert_id;

        // Correct path to the vendor autoload file
        require_once __DIR__ . 'vendor/autoload.php';
        use Twilio\Rest\Client;

        $sid = 'ACbb88c15de5903892469cb22164f998fa';
        $token = 'cbcbb958ba1bc028eaf1ce3e0ae39ff2';
        $twilio_number = '+17404802092';

        // Initialize Twilio client
        $client = new Client($sid, $token);

        $message = "PRENATAL MONITORING SYSTEM: $name, Urakoze Kwiyandikisha! Nimero Yawe Muri System ni: $last_id, Igihe giteganywa Ushobora Kubyariraho ni: $edd";

        $client->messages->create(
            $PhoneNumber, // User's phone number
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );

        echo "<script>alert('Names: $name. Your ID is: $last_id');</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
