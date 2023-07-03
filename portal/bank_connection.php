<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://mellipay.ir/api/v1/payment/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => '{
    "TransactionId": 12346,
    "Amount":100000,
    "CallBackUrl":"https://hafteno.ir/portal/check_payment.php"
 }',
  CURLOPT_HTTPHEADER => array(
    'M-Api-Key: cezB9v1wUARzUBE0L8',
    'M-Sec-Key: ZY6L1scy1op1wOE8od5R',
    'Content-Type: application/json'
  )
));

$response = curl_exec($curl);
$data = json_decode($response, true, 512, JSON_UNESCAPED_UNICODE);
if ($response === false) {
  echo 'cURL error: ' . curl_error($curl);
} else {
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ($httpCode == 200) {
    echo $response;
  } else {
    echo 'Unexpected HTTP status:'.$httpCode;
  }
}

curl_close($curl);
?>
