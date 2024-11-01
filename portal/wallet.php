<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@600&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> هفته نو | کیف پول</title>

  <style>
    .credit-box {
      border-radius: 10px;
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body dir="rtl">
    <header class="bg-dark py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <img src="./img/logo2.png" style="width:60px;margin:10px;" alt="Your Service Name" />

                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=panel">پیشخوان</a>
                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=calendar">تقویم های من</a>
                <a style="color:#fff;padding-left:20px;text-decoration:none;" href="?p=wallet">کیف پول</a>
                <a style="color:#aaa;padding-left:20px;text-decoration:none;" href="?p=wallet">پشتیبانی</a>
            </div>
          <div class="col-md-2 d-flex justify-content-end">
            <a href="?p=logout"><button class="btn btn-light">خروج</button></a>

          </div>
        </div>
        </div>
    </header>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3">
        <div class="credit-box">
          <h3>موجودی فعلی</h3>
          <p><!--###credit###--></p>
        </div>
      </div>
      <div class="col-md-1">
          </div>
      <div class="col-md-8 bg-light p-4">
        <div>
          <h4>افزایش موجودی حساب</h4>
          <form method="POST" action="get_payment_url_payping.php">
            <div class="mb-3">
              <input type="number" name="amount" class="form-control" required id="amount" placeholder="مبلغ به تومان">
            </div>
            <button type="submit" class="btn btn-primary">پرداخت</button>
          </form>
        </div>
        <table class="table mt-5">
          <thead>
            <tr>
              <th>شرح</th>
              <th>مبلغ</th>
              <th>تاریخ</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
