<?php
include '../../portal/conn.php';

// query to retrieve fullname column for all users
$sql = "SELECT * FROM user";

$result = $conn->query($sql);

// check if a row was returned
if ($result->num_rows > 0) {
    $rows = array();

    // fetch the rows and extract the fullname value
    while ($row = $result->fetch_assoc()) {
        $users[] = ['fullname' => $row['fullname'] , 'email' => $row['email'] , 'password' => $row['password'] , 'credit' => $row['credit'] , ];
    }

    // send the response as JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'users' => $users]);
} else {
    // no rows found
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'No users found']);
}

// close the database connection
$conn->close();
?>
