<?php
if(isset($_POST['amount'])){
    $ch = curl_init();
    $url = 'https://mellipay.ir/api/v1/payment/';
    $amount = $_POST['amount'];
    $transaction_code = $_POST['user_id'];
    $headers = array(
        'M-Api-Key: cezB9v1wUARzUBE0L8',
        'M-Sec-Key: ZY6L1scy1op1wOE8od5R',
        'Content-Type: application/json'
    );
    $data = array(
        'TransactionId' => $transaction_code,
        'Amount' => $amount,
        'CallBackUrl' => 'https://hafteno.ir/portal/check_payment.php'
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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode == 201) {
            $result = json_decode($response);
            header("location : ".$result->link);
            exit;
        } else {
            echo 'Unexpected HTTP status: ' . $httpCode;
            var_dump(json_decode($response, true, 512, JSON_UNESCAPED_UNICODE));
        }
    }
    curl_close($ch);
}

?>