<?php
require '../nurse-dashboard/vendor/autoload.php';
use GuzzleHttp\Client;

date_default_timezone_set('Africa/Kigali');
$date = date('d-m-Y');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'prenatal_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$appointDate = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['scheduler'])) {
    $patientID = $_POST['patientID'];
    $doctorName = $_POST['doctorName'];
    $appointmentDate = $_POST['appointmentDate'];
    $reason = $_POST['reason'];
    $reminder1 = $_POST['reminder1'];
    $reminder2 = $_POST['reminder2'];
    $reminder3 = $_POST['reminder3'];

    $sql = "SELECT regNo, name, PhoneNumber FROM pregnant WHERE regNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $patientID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $reg = $row['regNo'];
        $name = $row['name'];
        $phone = $row['PhoneNumber'];

        $stmt = $conn->prepare("INSERT INTO appointments (patientID, fullNames, telephone, doctorNames, appointDate, Reminder1, Reminder2, Reminder3, reason, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("issssssss", $patientID, $name, $phone, $doctorName, $appointmentDate, $reminder1, $reminder2, $reminder3, $reason);
        if ($stmt->execute()) {
            $apiKey = 'b533ffa090fdcee7c8aee64d35e6d77e-5ddad2a0-ac03-4d0e-beb8-1b07e201c1df';
            $message = "PMS: $name, Mwakoze Kuza Kuruyu Munsi Taliki ya $date, Uzagaruka: $appointmentDate, Impamvu: $reason";

            $client = new Client([
                'base_uri' => 'https://api.infobip.com'
            ]);
            $data = [
                'from' => 'ServiceSMS',
                'to' => $phone,
                'text' => $message
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
                    echo "<script>alert('Appointment scheduled and reminders set.'); window.location.href = 'index.php';</script>";
                    sendReminder($phone, "PMS! Mwiriwe Neza:  $name Turakwibusa Ko Uzagaruka Kuwa: $appointmentDate, Uzajya guhura na Muganga", $reminder1, $client);
                    sendReminder($phone, "PMS! Mwiriwe Neza:  $name Turakwibusa Ko Uzagaruka Kuwa: $appointmentDate, Uzajya guhura na Muganga", $reminder2, $client);
                    sendReminder($phone, "PMS! Mwiriwe Neza:  $name Turakwibusa Ko Uzagaruka Ejo Taliki ya: $appointmentDate, Uzagaruka guhura na Muganga", $reminder3, $client);
                } else {
                    echo "<script>alert('Appointment not scheduled and reminders not set.');</script>";
                }
                $stmt->close();
            } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage(). "');</script>'";
            }
        }
    } else {
        echo "<script>alert('Patient ID provided does not exist.');</script>";
    }
}

function sendReminder($phone, $message, $sendAt, $client) {
    $delay = strtotime($sendAt) - time();
    if ($delay > 0) {
        sleep($delay);
    }

    $client->post('/sms/2/text/single', [
        'headers' => [
            'Authorization' => 'App ' . $apiKey,
            'Content-Type' => 'application/json'
        ],
        'json' => [
            'from' => 'ServiceSMS',
            'to' => $phone,
            'text' => $message
        ]
    ]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
    label, h2, button {
        color: #1cc88a;
    }
    </style>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="h2-text justify-space-between">
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule Appointment <a href="viewAllAppoints.php" class="a float-right">
                <button type="button" class="btn bg-white">View Appointments</button></a>
            </h2>
        </div>
        <form id="appointmentForm" method="post" action="">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="patientID">Patient ID</label>
                        <input type="text" class="form-control form-control-sm" name="patientID" id="patientID" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="doctorName">Doctor Name</label>
                        <input type="text" class="form-control form-control-sm" name="doctorName" id="doctorName" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="appointmentDate">Appointment Date</label>
                        <input type="datetime-local" name="appointmentDate" class="form-control form-control-sm" id="appointmentDate" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Reminder 1</label>
                    <input type="datetime-local" name="reminder1" id="reminder1" class="form-control form-control-sm" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Reminder 2</label>
                    <input type="datetime-local" name="reminder2" id="reminder2" class="form-control form-control-sm" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Reminder 3</label>
                    <input type="datetime-local" name="reminder3" id="reminder3" class="form-control form-control-sm" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="reason">Reason for Appointment</label>
                        <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn float-right" name="scheduler" style="margin:0px 30px 0px 30px;">Schedule</button>
            </div>
        </form>
    </div>

    <script>
    const appointmentDateInput = document.getElementById('appointmentDate');
    const reminder1Input = document.getElementById('reminder1');
    const reminder2Input = document.getElementById('reminder2');
    const reminder3Input = document.getElementById('reminder3');

    appointmentDateInput.addEventListener('change', () => {
        const appointmentDate = new Date(appointmentDateInput.value);

        // Reminder 1: 5 days before the appointment date
        const reminder1Date = new Date(appointmentDate);
        reminder1Date.setDate(appointmentDate.getDate() - 5);
        reminder1Input.value = reminder1Date.toISOString().slice(0, 16);

        // Reminder 2: 3 days before the appointment date
        const reminder2Date = new Date(appointmentDate);
        reminder2Date.setDate(appointmentDate.getDate() - 3);
        reminder2Input.value = reminder2Date.toISOString().slice(0, 16);

        // Reminder 3: 1 day before the appointment date
        const reminder3Date = new Date(appointmentDate);
        reminder3Date.setDate(appointmentDate.getDate() - 1);
        reminder3Input.value = reminder3Date.toISOString().slice(0, 16);
    });
    </script>
</body>
</html>
