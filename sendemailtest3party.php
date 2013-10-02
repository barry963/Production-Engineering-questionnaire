<html>
<body>


<?php
// Your ID and token
$authToken = 'OAuth 2.0 token here';

$attachment =chunk_split(base64_encode(file_get_contents('Senor1_30.9.2013_10.31.xls')));


// The data to send to the API

$postData = array(
    'From' => 'e1100587@puv.fi',
    'To' => 'barry963@gmail.com',
    'Subject' => 'Consultaion9',
    'TextBody' => 'Dear Sir, This is an test email! Please check if you have received the email! Thank you!',
    'Headers' =>  '[{ "Name" : "CUSTOM-HEADER", "Value" : "value" }]',
    'Attachments' => '[{"Name": "readme.txt", "Content": "dGVzdCBjb250ZW50","ContentType": "text/plain"}]');

/*
$postData = array(
    'FromAddress' => 'barry963@barry963.simpleyak.com',
    'ToAddress' => 'e1100587@puv.fi',
    'Subject' => 'Consultaion963',
    'TextBody' => 'Dear Sir, This is an test email! Please check if you have received the email! Thank you!',
    'Attachments:' => '[
    {"Filename" : "readme.txt", "Content" : "dGVzdCBjb250ZW50"}
    ]'
);
*/
// Setup cURL
//$ch = curl_init('https://api.emailyak.com/v1/t0b2n7wjwk278wy/json/send/email/');
$ch = curl_init('https://api.postmarkapp.com/email');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'X-Postmark-Server-Token: e5426f25-3f3a-4a91-a4be-8c81ee02bf88',
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));


// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

echo $response;

echo $responseData;
// Print the date from the response
echo $responseData['published'];
?>

</body>
</html>
