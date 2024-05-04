<?php

$baseUrl = 'https://apis.rentalcarmanager.com/booking/v3.2/?apikey=QXVFYXp5Q2FyUmVudGFsczY4OVt1bmRlZmluZWRdfFNpZW5uYUNyZWF0aXZlRGlnaXRhbHx0R1BBTnZLdA==';

$requestBody = json_encode([
    "method" => "bookinginfo",
    "reservationref" => "000489E22075479"
]);

$secretKey = 'pzsEqD5qGwhoh0orAs8ivNhh4b6ocFmc'; 
$signature = hash_hmac('sha256', $requestBody, $secretKey);

$ch = curl_init($baseUrl);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'signature: ' . $signature 
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    echo 'API Response: ' . $response;
}

curl_close($ch);
?>
