<?php
    if(isset($_POST['tracking_code']) && $_POST['Status'] == 3){
        $tracking_code = $_POST['tracking_code'];
        $transaction_code = $_POST['RefNum'];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://mellipay.ir/api/v1/payment/verify/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"TransactionId": '.$transaction_code.', "Mellipay_Tracking_Code": "'.$tracking_code.'"}');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'M-Api-Key: cezB9v1wUARzUBE0L8',
            'M-Sec-Key: ZY6L1scy1op1wOE8od5R',
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($status_code == 200) {
            $result = json_decode($response);
            $amount = $result->Amount;
            if($result->status == 1){
                header('location:https://hafteno.ir/portal/bank_add_amount.php?amount='.$amount);
            }
        } else {
            echo 'Unexpected HTTP status: ' . $status_code;
        }
    }
    else{
        echo 'تراکنش ناموفق!';
    }
?>