<?php
    function register($email, $password, $fullname, $credit) {
        include 'conn.php';
        $sql = "INSERT INTO user (email, password, fullname,credit,created_at,last_modified)VALUES ('$email', '$password', '$fullname',$credit,NOW(),NOW())";

        if ($conn->query($sql) === TRUE) {
        header('location: ../system.html');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    function login($email, $password) {
        include 'conn.php'; // assuming this file establishes a database connection
      
        // prepare and execute a SELECT statement to find a user with the given email and password
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
      
        // if a user is found, set the email as a session variable and return true
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $_SESSION['id'] = $row['id'];
          if($row['is_admin'] == 1){
            $_SESSION['isAdmin'] = true;
          }
          else{
            $_SESSION['isAdmin'] = false;
          }
          return true;
        }
      
        // if no user is found, return false
        return false;
      }
      function logout() {
        session_destroy();
      }
      function requestChatGPT($message) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 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',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n     \"model\": \"gpt-3.5-turbo\",\n     \"messages\": [{\"role\": \"user\", \"content\": \"".$message."\"}],\n     \"temperature\": 0.7\n   }");
        
        $response = curl_exec($ch);
        echo $response;
        curl_close($ch);
        $jresponse = json_decode($response);
        return ($jresponse->choices[0]->message->content);
    }  
function getCalendars() {
    include 'conn.php'; // assuming this file establishes a database connection

    // prepare and execute a SELECT statement to find a user with the given email and password
    $stmt = $conn->prepare("SELECT * FROM weekcalendar WHERE user_id = ?");
    $user_id = $_SESSION['id']; // or assign the appropriate user ID here
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // if rows are found, store them in an array and return it
    if ($result->num_rows > 0) {
        $rows = array(); // Create an empty array to store the rows
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row; // Add each row to the array
        }
        return $rows; // Return the array of rows
    }

    return $result;
}
function getCredit() {
    include 'conn.php'; // assuming this file establishes a database connection

    $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
    $user_id = $_SESSION['id']; // or assign the appropriate user ID here
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // fetch the first row if it exists
    $row = $result->fetch_assoc();
    
    // return the row
    return $row['credit'];
}
function getName() {
    include 'conn.php'; // assuming this file establishes a database connection

    $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
    $user_id = $_SESSION['id']; // or assign the appropriate user ID here
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // fetch the first row if it exists
    $row = $result->fetch_assoc();
    
    // return the row
    return $row['fullname'];
}
      
?>