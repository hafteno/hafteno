<?php

include 'conn.php';
// user ID to retrieve token_amount for
$id = $_GET['id'];
$add_amount = $_GET['a'];
// query to retrieve token_amount column for a specific user
$sql = "SELECT credit FROM user WHERE id=$id";

$result = $conn->query($sql);
// check if a row was returned
if(mysqli_num_rows($result)> 0){
    // fetch the row and extract the token_amount value
    $row = $result->fetch_assoc();
    $old_amount = $row["credit"];
    $new_amount = $old_amount + $add_amount;
    $sql = "UPDATE user SET credit = $new_amount, last_modified = NOW()  WHERE id = $id";
    $conn->query($sql);

    header('Content-Type: application/json');
    echo json_encode(['success'=>true,'new_amount'=>$new_amount,'old_amount'=>$old_amount ,'message'=>'Amount is updated successfuly']);
}
else{
    header('Content-Type: application/json');
    echo json_encode('0');
}
// close the database connection
$conn->close();

?>