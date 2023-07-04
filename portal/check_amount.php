<?php

include 'conn.php';

// user ID to retrieve token_amount for
$id = $_GET['id'];

// query to retrieve token_amount column for a specific user
$sql = "SELECT credit FROM user WHERE id=$id";

$result = $conn->query($sql);
if(mysqli_num_rows($result)> 0){
// check if a row was returned
    // fetch the row and extract the token_amount value
    $row = $result->fetch_assoc();
    $amount = $row["credit"];
    $isSuccess = false;
    $message = 'The amount is lower than 25000 and you can not send a request!';

    if($amount >= 25000){
         $isSuccess = true;
         $message = 'The amount is possible to request';
    }

    header('Content-Type: application/json');
    echo json_encode(['success'=>$isSuccess,'amount'=>$amount,'message'=>$message]);
}
// close the database connection
$conn->close();

?>