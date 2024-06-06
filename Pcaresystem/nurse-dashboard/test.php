<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Form</h2>
    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone"  required>
        <small>Format: 123-456-7890</small><br><br>

        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;


$apiKey = 'b533ffa090fdcee7c8aee64d35e6d77e-5ddad2a0-ac03-4d0e-beb8-1b07e201c1df';

if(isset($_POST['submit'])){
$name = $_POST['name'];
$phone = $_POST['phone'];

$message = "Hello $name! This is a test message from Infobip.";

$client = new Client([
    'base_uri' => 'https://api.infobip.com'
]);

$data = [
    'from' => 'ServiceSMS', // Sender name or number
    'to' => $phone, // Recipient number
    'text' => $message // Your message
];

// Send the SMS
try {
    $response = $client->post('/sms/2/text/single', [
        'headers' => [
            'Authorization' => 'App ' . $apiKey,
            'Content-Type' => 'application/json'
        ],
        'json' => $data
    ]);

    
    if ($response->getStatusCode() == 200) {
        echo 'SMS sent successfully';
    } else {
        echo 'Failed to send SMS: ' . $response->getBody();
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
}
?>
