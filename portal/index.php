<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .loading-cover {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
        }

        /* CSS for the loader GIF */
        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
      <!--Loading-->
      <div class="loading-cover">
      Loading
      <img class="loader" width="80" src="img/loading.gif" alt="Loading..." />
    </div>
    <script>
  // JavaScript to show and hide the loading cover
  document.onreadystatechange = function() {
    var loadingCover = document.querySelector('.loading-cover');

    if (document.readyState === 'loading') {
      loadingCover.style.display = 'block';
    } else {
      loadingCover.style.display = 'none';
    }
  };
</script>
</body>
</html>
<?php
include 'functions.php';
$panel = file_get_contents('panel.html');
if(isset($_GET['p']) && $_GET['p'] == 'panel'){
    if(isset($_SESSION['id'])){
        $panel =  str_replace("<!--###credit###-->"," <a href='?p=wallet
        '><button class='btn btn-light'>".getCredit()." تومان</button></a> ",$panel);
        $panel =  str_replace("<!--###name###-->",getName(),$panel);
    }
    else{
        header('Location: ../system.html');
    }
    $credit = getCredit();
    if($credit <= 25000){
        $panel =  str_replace('<!--###credit_error###-->','<div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="alert w-100 alert-danger " role="alert">
            موجودی حساب شما کافی نیست . برای دریافت تقویم محتوایی موجودی خود را افزایش دهید
            <a href="?p=wallet"><button class="btn btn-light">شارژ حساب</button></a>
            </div>
          </div>
        </div>
      </div>',$panel);
    }
    echo $panel;
}

if(isset($_POST['generate_cc'])){
    $credit = getCredit();
    if($credit > 25000){
        include 'conn.php';
        $category = $_POST['category'];
        $job = $_POST['job'];
        $desc = $_POST['desc'];

        $new_credit = ($credit - 20000);
        $stmt = $conn->prepare("UPDATE user SET credit = ? WHERE id=?");

        // Bind parameters to the statement
        $stmt->bind_param("ii", $new_credit,$_SESSION['id']);


        // Execute the statement
        if ($stmt->execute()) {
            $json_response = requestChatGPT('[no prose][only json output][{day in english:{ideas:[array of ideas in persian]}}]به عنوان یک متخصص شبکه اجتمایی اینستاکرام برای این صفحه یک تقویم محتوایی برای پست و استوری یک هفته ای بنویس که این پست ها وایرال شوند تا حدود ۱ میلیون بازدیداین صفحه در زمینه '.$category.' با فعالیت بصورت تخصصی در زمینه '.$job.' میباشدخلاصه فعالیت ما:'.$desc);

            $stmt2 = $conn->prepare("INSERT INTO weekcalendar (user_id, title, subtitle, description, data) VALUES (?, ?, ?, ?, ?)");

            // Bind parameters to the statement
            $stmt2->bind_param("issss", $user_id, $title, $subtitle, $description, $data);

            // Set the values for each parameter
            $user_id = $_SESSION['id'];
            $title = $category;
            $subtitle = $job;
            $description = $desc;
            $data = $json_response;

            // Execute the statement
            if ($stmt2->execute()) {
                // header('location: ?p=calendar');
            } else {
                header('location: ?error=1');
            }
        }

        $stmt->close();
        $conn->close();
        echo '<script type="text/javascript">';
        echo 'window.location.href = "?p=calendar";';
        echo '</script>';
        
        

    }
}

if(!isset($_GET['p'])) {
    if(isset($_SESSION['id'])){
      if($_SESSION['isAdmin']){
        header('Location: ../admin');
      }
      else{
        header('location: ?p=panel');
      }
    }
    else{
        header('location: ../system.html');
    }
}

echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>هفته نو | Hafteno</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@600&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </head>
  <body id="body" dir="rtl" class="bg-light">

    ';
if(isset($_GET['p']) && $_GET['p'] == 'register'){
    if(!isset($_SESSION['id'])){
        echo '<div class="container d-flex justify-content-center">
        <div class="card mt-5  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">
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
    if(!isset($_SESSION['id'])){
        echo '<div class="container-fluid d-flex justify-content-center">
            <div class="card mt-5 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">
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
                <a style="text-decoration:none !important;" href="#">رمز عبور خود را فراموش کرده‌اید؟</a><br>
                <a style="text-decoration:none !important;" href="?p=register">آیا حساب کاربری ندارید؟</a>
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
if(isset($_GET['p']) && $_GET['p'] == 'calendar'){
    if(isset($_SESSION['id'])){
        echo '
        <!-- Header -->
    <header class="bg-dark py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <img src="./img/logo2.png" style="width:60px;margin:10px;" alt="Your Service Name" />

                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=panel">پیشخوان</a>
                <a style="color:#fff;padding-left:20px;text-decoration:none;" href="?p=calendar">تقویم های من</a>
                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=wallet">کیف پول</a>
                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=wallet">پشتیبانی</a>
            </div>
          <div class="col-md-2 d-flex justify-content-end">
            <a href="?p=logout"><button class="btn btn-light">خروج</button></a>
            <!--###credit###-->
          </div>
        </div>
        </div>
    </header>';
        $calendars = getCalendars();
        echo '<div class="container mt-5">
                <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                <div class="row align-items-center">';
        foreach($calendars as $calendar){
            $id = $calendar['id'];
            $data = json_decode($calendar['data'], true);
            $title = $calendar['title'];
            $subtitle = $calendar['subtitle'];
            echo'
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#calendar-'.$id.'" aria-expanded="false" aria-controls="calendar-'.$id.'">
                                '.$title.' '.$subtitle.'
                        </button>
                    </div>

                ';
        }
        echo '</div></div>';
        foreach($calendars as $calendar){
            $id = $calendar['id'];
            $data = json_decode($calendar['data'], true);
            $title = $calendar['title'];
            $subtitle = $calendar['subtitle'];
             echo '
                <div class="container collapse" id="calendar-'.$id.'" style="border-radius:10px;margin-top:20px;padding:10px">
                <div class="row d-flex justify-content-center">
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 ">
                    <table class="table text-center">
                      <tbody>';
            $days = ['شنبه','یک شنبه','دو شنبه','سه شنبه','چهار شنبه','پنج شنبه','جمعه'];
            $i = 0;
            foreach($data as $day => $ideas){
              echo "<tr><td><ul class='list-group p-0'>";
              echo "<li class='list-group-item active'>".$days[$i]."</li>";
              foreach($ideas["ideas"] as $idea){
                echo "<li class='list-group-item'>$idea</li>";
              }
              echo "</td></tr>";
              $i++;
            }
        echo '
        </div>
        </div>
      </tbody>
  </table>
</div>
</div>
</div>';
        }
    }
    else{
        header('Location: ../system.html');
    }
}
if(isset($_GET['p']) && $_GET['p'] == 'wallet'){
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $wallet = file_get_contents('wallet.html');
        $wallet =  str_replace("<!--###credit###-->","<b class='h3'>".getCredit()."</b> تومان",$wallet);
        $wallet =  str_replace("###user_id###",$id,$wallet);
        echo $wallet;
    }
}
if(isset($_GET['p']) && $_GET['p'] == 'logout'){
    logout();
    header('Location: ../system.html');
}

if(isset($_POST['register_button'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
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
    $password = md5($password);
    $result = login($email, $password);
    if($result){
      if($_SESSION['isAdmin']){
        header('Location: ../admin');
      }
      else{
        header('location: ?p=panel');
      }
    }
}
echo '<footer>
<a href="https://wa.me/4915774239103"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/WhatsApp_logo-color-vertical.svg/2048px-WhatsApp_logo-color-vertical.svg.png" style="width:50px;position: fixed;bottom: 20px;right: 20px;"></a>
</footer></div>';
echo '</body></html>';
?>