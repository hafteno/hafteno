<?php
if(isset($_POST['amount'])){
    $ch = curl_init();
    $url = 'https://api.payping.ir/v2/pay';
    $amount = $_POST['amount'];
    $transaction_code = $_POST['user_id'];
    $headers = array(
        'Authorization: Bearer 8-56JaQPb3NJe-_C5wLi9gn5wKcEv7-PgboXnTh1qKQ',
        'Content-Type: application/json'
    );
    $data = array(
        "amount"=> $amount,
        "returnUrl"=> "https://hafteno.ir/portal/check_payment"
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
        //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //if ($httpCode == 201) {
        //    $result = json_decode($response);
         //   header("location : ".$result->link);
           // exit;
        //} else {
          //  echo 'Unexpected HTTP status: ' . $httpCode;
        //    var_dump(json_decode($response, true, 512, JSON_UNESCAPED_UNICODE));
        //}
    }
    curl_close($ch);
}

?>