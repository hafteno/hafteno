<?php
session_start();

if(!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']){
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Authentication required']);
}
else{
    include '../portal/conn.php';

    // query to retrieve fullname column for all users
    $sql = "SELECT * FROM weekcalendar";

    $result = $conn->query($sql);

    // check if a row was returned
    if ($result->num_rows > 0) {
        $rows = array();

        // fetch the rows and extract the fullname value
        while ($row = $result->fetch_assoc()) {
            $calendar[] = ['user_id' => $row['user_id'] , 'title' => $row['title'] , 'subtitle' => $row['subtitle'] , 'description' => $row['description'] , 'instagram_id' => $row['instagram_id']];
        }

        // send the response as JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'calendar' => $calendar]);
    } else {
        // no rows found
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'No calendar found']);
    }

    // close the database connection
    $conn->close();
}
?>
