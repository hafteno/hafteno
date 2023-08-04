<?php
    $ch = curl_init();
    $url = 'https://api.payping.ir/v1/customer';
    $headers = array(
        'Authorization: Bearer 8-56JaQPb3NJe-_C5wLi9gn5wKcEv7-PgboXnTh1qKQ',
        'Content-Type: application/json'
    );
    $data = array(
        "firstName"=> "Amirsalar",
        "lastName"=> "Nazokkar"
        );
    $body = json_encode($data);
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_HTTPHEADER => $headers
    ));
    $response = curl_exec($ch);
    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        var_dump($response);
        
    }
    curl_close($ch);

?>