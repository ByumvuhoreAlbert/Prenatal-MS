<?php 

require __DIR__ . '/vendor/autoload.php'; // Load the Twilio PHP library

use Twilio\Rest\Client;
use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sid = getenv('TWILIO_ACCOUNT_SID'); // Your Account SID from .env file
$token = getenv('TWILIO_AUTH_TOKEN'); // Your Auth Token from .env file

$client = new Client($sid, $token);

try {
    // Example of creating a message
    $message = $client->messages->create(
        '+250784481603', // Destination phone number
        [
            'from' => '++17404802092', // Twilio phone number
            'body' => 'Hello, this is a test message!'
        ]
    );
    echo 'Message sent: ' . $message->sid;
} catch (Twilio\Exceptions\RestException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>