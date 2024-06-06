<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$date = date('d-m-Y');
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['send'])) {

    function sanitize($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

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

    if ($gravida !=="G1") {
      $termDeliveries = isset($_POST['termDeliveries']) ? sanitize($_POST['termDeliveries']) : '';
      $prematureDeliveries = isset($_POST['prematureDeliveries']) ? sanitize($_POST['prematureDeliveries']) : '';
      $numAbortions = sanitize($_POST['numAbortions']);
      $parity = isset($_POST['parity']) ? sanitize($_POST['parity']) : '';
      $ageLastBorn = sanitize($_POST['ageLastBorn']);
      $aliveChildren = sanitize($_POST['aliveChildren']);

    $query = "INSERT INTO pregnant (regNo, hospital, healthCenter, healthPost, name, dob, age, MaritalStatus, partnerName, partnerAge, employment, bloodGroup, PhoneNumber, ContactNumber, education, ubudehe, religion, accompany, province, district, sector, cell, village, gravida, termDelivery, prematureDelivery, numAbortions, parity, AgeLastBorn, AliveChildren, lmpd, edd, registed_date, pregnant_status) VALUES ('','$hospital', '$healthCenter', '$healthPost', '$name', '$dob', '$age','$maritalStatus', '$partnerName', '$partnerAge', '$employment', '$bloodGroup', '$PhoneNumber', '$ContactNumber', '$education', '$ubudehe', '$religion', '$accompaniedBy', '$province', '$district', '$sector', '$cell', '$village', '$gravida', '$termDeliveries', '$prematureDeliveries', '$numAbortions', '$parity', '$ageLastBorn', '$aliveChildren', '$lmpd', '$edd', NOW(), 'Progress')";
} else{
  $query = "INSERT INTO pregnant (regNo, hospital, healthCenter, healthPost, name, dob, age, MaritalStatus, partnerName, partnerAge, employment, bloodGroup, PhoneNumber, ContactNumber, education, ubudehe, religion, accompany, province, district, sector, cell, village, gravida, termDelivery, prematureDelivery, numAbortions, parity, AgeLastBorn, AliveChildren, lmpd, edd, registed_date, pregnant_status) VALUES ('','$hospital', '$healthCenter', '$healthPost', '$name', '$dob', '$age','$maritalStatus', '$partnerName', '$partnerAge', '$employment', '$bloodGroup', '$PhoneNumber', '$ContactNumber', '$education', '$ubudehe', '$religion', '$accompaniedBy', '$province', '$district', '$sector', '$cell', '$village', '$gravida', 'Null', 'Null', '0', 'Null', '0', '0', '$lmpd', '$edd', NOW(), 'Progress')";

}
    if ($conn->query($query) === TRUE) {
        $last_id = $conn->insert_id;
        $apiKey = 'b533ffa090fdcee7c8aee64d35e6d77e-5ddad2a0-ac03-4d0e-beb8-1b07e201c1df';


        $message = "PRENATAL MONITORING SYSTEM: $name, Urakoze Kwiyandikisha! Nimero Yawe Muri System ni: $last_id, Igihe giteganywa Ushobora Kubyariraho ni: $edd";

        $client = new Client([
    'base_uri' => 'https://api.infobip.com'
  ]);
  $data = [
    'from' => 'ServiceSMS', // Sender name or number
    'to' => $PhoneNumber, // Recipient number
    'text' => $message // Your message
];

try {
    $response = $client->post('/sms/2/text/single', [
        'headers' => [
            'Authorization' => 'App ' . $apiKey,
            'Content-Type' => 'application/json'
        ],
        'json' => $data
    ]);

    if ($response->getStatusCode() == 200) {
        echo "<script>alert('Names: $name. Your ID is: $last_id');</script>";
    } else {
        echo "<script>alert('Failed to send SMS " . $response->getBody() . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Error: " . $e->getMessage(). "');</script>'";
}

}
}
?>
