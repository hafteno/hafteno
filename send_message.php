<?php
if(isset($_POST['send_message'])){
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $message_form = urlencode("ایمیل کاربر :".$email."\r\nموضوع پیام: ".$title."\r\n متن پیام: ".$message);
    file_get_contents('https://api.telegram.org/bot6395352884:AAGYKsI8IQFYz1eenI25EVDPJWTX-LxYAtU/sendMessage?chat_id=-943454583&text='.$message_form);
    header('Location: contactus.php?success=1');
}
?>