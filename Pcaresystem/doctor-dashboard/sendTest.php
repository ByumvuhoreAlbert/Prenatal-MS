<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Send Treatment Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container" style="margin-top:30px;">
    <h4 class="modal-title">Send Treatment Results</h4>
    <table class="table" id="example" collapse="0">
        <thead>
        <tr>
            <th>No of Contacts</th>
            <th>Test Date</th>
            <th>Patient ID</th>
            <th>Names</th>
            <th>Phone</th>
            <th>Fundal Height</th>
            <th>Fetal Presentation</th>
            <th>Fetal Heart Beat</th>
            <th>Appointment Date</th>
            <th>Maternal Contents</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require '../nurse-dashboard/vendor/autoload.php';
        use GuzzleHttp\Client;

        $conn = new mysqli('localhost', 'root', '', 'prenatal_db');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $date = date('Y-m-d');

        // Query the database
        $query = "
            SELECT p.*, pc.Contacts, us.Test_Date, us.Fundal_Height, us.Fetal_Presentation, us.Fetal_Heart_Beat, a.appointDate, us.MaternalComments
            FROM pregnant p
            JOIN patientconsoltation pc ON p.regNo = pc.PatientID
            JOIN ultrasoundtable us ON p.regNo = us.PatientID
            JOIN appointments a ON p.regNo = a.patientID
        ";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='row_{$row['regNo']}'>
                        <td>{$row['Contacts']}</td>
                        <td>{$row['Test_Date']}</td>
                        <td>{$row['regNo']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['PhoneNumber']}</td>
                        <td>{$row['Fundal_Height']}</td>
                        <td>{$row['Fetal_Presentation']}</td>
                        <td>{$row['Fetal_Heart_Beat']}</td>
                        <td>{$row['appointDate']}</td>
                        <td>{$row['MaternalComments']}</td>";
                echo "
                        <form method='post' action=''>
                        <td>
                          <input type='hidden' value='{$row['PhoneNumber']}' name='PhoneNumber'>
                          <input type='hidden' name='message' value='TARIKI YA: {$row["Test_Date"]}, KUVA MURI PMS, {$row["name"]}, UFITE NIMERO: {$row["regNo"]}, Telephone: {$row["PhoneNumber"]}, IBISUBIZO BYAWE NI: UBUREBURE BWA NYABABYEYI: {$row["Fundal_Height"]}, UKO UMWANA AMEZI MUNDA: {$row["Fetal_Presentation"]}, GUTERA KUMUTIMA W UMANA: {$row["Fetal_Heart_Beat"]}, ITARIKI AZAGARUKIRAHO: {$row["appointDate"]}, ICYONGERWAHO: {$row['MaternalComments']}. MURAKOZE.'>
                          <button type='submit' class='btn btn-success' name='send' onclick='removeRow({$row['regNo']})'>Send</button>
                        </td>
                      </form>
                      </tr>";
            }
        }

        if (isset($_POST['send'])) {
            $phone_number = $_POST['PhoneNumber'];
            $message = $_POST['message'];

            $client = new Client([
                'base_uri' => 'https://api.infobip.com'
            ]);

            $apiKey = 'b533ffa090fdcee7c8aee64d35e6d77e-5ddad2a0-ac03-4d0e-beb8-1b07e201c1df';

            $data = [
                'from' => 'ServiceSMS',
                'to' => $phone_number,
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
                    echo "<script>alert('SMS sent successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to send SMS.');</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function removeRow(regNo) {
        document.getElementById('row_' + regNo).style.display = 'hide';
    }
</script>

</body>
</html>
