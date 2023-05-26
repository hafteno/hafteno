<?php
session_start();
if(!isset($_GET['p'])) {
    if(isset($_SESSION['user'])){
        header('location: ?p=panel');
    }
    else{
        header('location: ?p=login');
    }
}
include 'functions.php';
echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>تقویم تولید محتوای ....</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body dir="rtl" class="bg-light">';
if(isset($_GET['p']) && $_GET['p'] == 'register'){
    if(!isset($_SESSION['user'])){
        echo '<div class="container d-flex justify-content-center">
        <div class="card mt-5" style="width: 30vw;">
          <div class="card-body">
            <h5 class="card-title">ثبت نام</h5>
            <form action="" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">گذرواژه</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="fullname" class="form-label">نام کامل</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
              </div>
              <button type="submit" class="btn btn-primary" name="register_button">ثبت نام</button>
            </form>
          </div>
        </div>
      </div>
      ';
    }
    else{
        header('location: ?p=panel');
    }
}
if(isset($_GET['p']) && $_GET['p'] == 'login'){
    if(!isset($_SESSION['user'])){
        echo '<div class="container d-flex justify-content-center">
            <div class="card mt-5" style="width: 30vw;">
            <div class="card-body">
                <h5 class="card-title">ورود به حساب کاربری</h5>
                <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">آدرس ایمیل</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">گذرواژه</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">
                    مرا به خاطر بسپار
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" name="login_button">ورود</button>
                </form>
                <div class="mt-3">
                <a href="#">رمز عبور خود را فراموش کرده‌اید؟</a>
                </div>
            </div>
            </div>
        </div>
        ';
    }
    else{
        header('location: ?p=panel');
    }
}
if(isset($_GET['p']) && $_GET['p'] == 'panel'){
    if(isset($_SESSION['user'])){
        include 'panel.html';
    }
    else{
        header('Location: ?p=login');
    }
}
if(isset($_GET['p']) && $_GET['p'] == 'logout'){
    logout();
    header('Location: ?p=login');
}
if(isset($_POST['register_button'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $credit = 0;

    $result = register($email, $password, $fullname, $credit);

    if ($result) {
        header('Location: ?p=panel');
    }
}
if(isset($_POST['login_button'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = login($email, $password);
    if($result){
        $_SESSION['user'] = $email;
        header('Location: ?p=panel');
    }
}
if(isset($_POST['generate_cc'])){
    $category = $_POST['category'];
    $job = $_POST['job'];
    $desc = $_POST['desc'];
    $json_response = requestChatGPT('به عنوان یک متخصص شبکه اجتمایی اینستاکرام برای این صفحه یک تقویم محتوایی برای پست و استوری یک هقته ای بنویس گه این پست ها وایرال شوند تا حدود ۱ میلیون بازدید\nاین صفحه در زمینه '.$category.' با فعالیت بصورت تخصصی در زمینه '.$job.' میباشد\nخلاصه فعالیت ما:\n'.$desc.'\nresponse it in persian in json format without any text before and after json object\nbegin on Saturday\nthe object has weekday in english,ideas(array) ');
    $data = json_decode($json_response, true);
    echo '
<div class="container py-5">
<div class="row">
  <div class="col">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">شنبه</th>
          <th scope="col">یک شنبه</th>
          <th scope="col">دو شنبه</th>
          <th scope="col">سه شنبه</th>
          <th scope="col">چهار شنبه</th>
          <th scope="col">پنج شنبه</th>
          <th scope="col">جمعه</th>
        </tr>
      </thead>
      <tbody>
        <tr>';
            $data = json_decode($json_response, true);
            foreach($data as $day => $ideas){
              echo "<td>";
              foreach($ideas["ideas"] as $idea){
                echo "<li>$idea</li>";
              }
              echo "</td>";
            }
        echo '</tr>
      </tbody>
  </table>
</div>
</div>
</div>';
}
echo '</html>';
?>