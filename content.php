<!doctype html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.0">
  <meta name="HandheldFriendly" content="true">
  <title>بلاگ</title>
  <link rel="icon" type="image/x-icon" href="/img/logo-light.ico">
  <link rel="stylesheet" href="css/theme.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;600;900&family=Quicksand&display=swap" rel="stylesheet">


  <style>
    /* inter-300 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-300.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-300.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* inter-400 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-regular.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-500.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-500.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-700.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-700.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }
  </style>


</head>

<body dir="rtl" class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

  <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center"">
      <a class="navbar-brand pe-md-4 fs-4 col-3 col-md-auto text-center" href="index.html">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack"
          viewBox="0 0 16 16">
          <path
            d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
          <path
            d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
        </svg>
        <span class="ms-md-1 mt-1 fw-bolder me-md-5">هفته نو</span>
      </a>
    </div>
    <div class="col-12 col-lg-6 d-flex justify-content-center">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal p-0">
        <li class="nav-item">
          <a class="nav-link fs-5" href="index.html" aria-label="Homepage">
            خانه
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="content.html" aria-label="A sample content page">
            بلاگ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="system.html" aria-label="A system message page">
            ورود
          </a>
        </li>

      </ul>
    </div>
    <div class="col-3 d-flex justify-content-center"">
      <!-- <a href="system.html" aria-label="Download this template" class="btn btn-outline-light">
        <small>ورود به سامانه</small>
      </a> -->
    </div>
  </nav>

  <main>
    <?php
    $posts = [
      'معاون علمی و فناوری ریاست‌جمهوری: باید خودمان تولیدکننده هوش مصنوعی باشیم'=>'مراسم افتتاحیه بیست‌وششمین دوره نمایشگاه الکامپ با قطعی‌های مکرر برق سالن، نیمه‌کاره به پایان رسید.',
      'تحول تکنولوژیک در خودروسازی؛ هوش مصنوعی تویوتا برای طراحی بدنه معرفی شد'=>'خودروساز بزرگ ژاپنی، ابزاری را طراحی و تولید کرده است که به طراحان اجازه می‌دهد خودروهای جدید را سریع‌تر و بهینه‌تر خلق کنند.',
      'تجربه استفاده از هوش مصنوعی در دیجی‌کالا: کمک به تسهیل امور کسب‌وکار'=>'هوش مصنوعی در دیجی‌کالا به بررسی نظرات، کیفیت کالاهای فروشندگان و محیط زیست کمک می‌کند.',
      '«خودنویس»، امکان تولید محتوا با هوش مصنوعی را فراهم می‌کند'=>'استارتاپ خودنویس، امکان تولید و ویرایش محتوا با هوش مصنوعی را فراهم می‌کند.',
      'شرکت‌ها یکی پس از دیگری استفاده از ChatGPT در محیط کار را ممنوع می‌کنند!'=>'شرکت‌ها برای پیشگیری از فاش‌شدن اطلاعات محرمانه و کاهش خطای سازمانی در حین کار، استفاده از ChatGPT را ممنوع می‌کنند.',
      'کاربرد دیگری از هوش مصنوعی ChatGPT: کمک به انسان برای حرف‌زدن با درختان!'=>'یکی دیگر از توانایی‌های شگفت‌انگیز ChatGPT کمک به انسان برای صحبت‌کردن با درختان است؛ اما این کار چطور انجام می‌شود؟',
      'رئیس کمیته اقتصاد دیجیتال مجلس: نمی‌توان با افکار 40 سال قبل در حوزه فضای مجازی و هوش مصنوعی تصمیم گرفت'=>'به باور توانگر، نمی‌توان درنظر، در پی پیشرفت، رشد و توسعه بود و درعمل، انگشت خود را به نشانه تسلیم بر دکمه فیلترینگ فشرد.',
      'مدیرعامل کارنامه: به یک پلتفرم جامع خدمات خودرویی تبدیل خواهیم شد'=>'کارنامه به‌دنبال سهم بازار 30 درصدی است و در این راستا می‌خواهد به سرویس جامع خدمات خودرویی تبدیل شود.',
      'دیجی‌نکست، کارایا و نیک‌ونچرز در استارتاپ اکتین هم‌سرمایه‌گذاری می‌کنند'=>'دیجی‌نکست، کارایا و نیک‌ونچرز در استارتاپ اکتین که مبتنی بر هوش مصنوعی فعالیت می‌کند، هم‌سرمایه‌گذاری می‌کنند.',
      'وزیر ارتباطات: سند توسعه هوش مصنوعی درحال تدوین است'=>'به گفته زارع‌پور، وزارت ارتباطات نقشه راه ملی توسعه هوش مصنوعی را تدوین و در اختیار مراکز سیاست‌گذار و تصمیم‌گیر قرار داده است.',
      'تحقیقات جدید: ارزش بازار هوش مصنوعی تا دهه‌ آینده از مرز ۱.۳۲ تریلیون دلار عبور می‌کند'=>'ارزش بازار هوش مصنوعی احتمالاً‌ از ۴۰ میلیارد دلار در سال ۲۰۲۲ به ۱.۳۲ تریلیون دلار می‌رسد.',
      'تحلیلگر بازار: درآمد مایکروسافت با هوش مصنوعی تا ۲۰۲۷ حدود ۱۰۰ میلیارد دلار افزایش پیدا می‌کند'=>'درآمد مایکروسافت به‌واسطه برنامه‌های مبتنی بر هوش مصنوعی تا سال ۲۰۲۷ در حدود ۱۰۰ میلیارد دلار افزایش پیدا می‌کند.',
      'یک قاضی در آمریکا برای مقابله با هوش مصنوعی پیش‌نیاز جدیدی را جهت حضور در دادگاه معرفی کرد'=>'قاضی فدرال تگزاس می‌گوید از این به بعد وکلا باید شهادت بدهند که از هوش مصنوعی استفاده نکرده‌اند یا محتواهای آن را بررسی کرده‌اند.',
      'دستاورد دیگری از هوش مصنوعی: شناسایی آنتی‌بیوتیکی که با عفونت‌های مقاوم به دارو مبارزه می‌کند'=>'محققان با هوش مصنوعی، ترکیب دارویی آنتی‌بیوتیکی را شناسایی کرده‌اند که می‌تواند عفونت‌های مقاوم به دارو را از بین ببرد.',
      'این ربات‌ مجهز به هوش مصنوعی به‌عنوان جایگزین انسان، کار گشت‌زنی را انجام می‌دهد '=>'ربات‌های ساخته‌شده توسط شرکت سوئیسی Ascento دارای دو چرخ، چندین سنسور و هوش مصنوعی هستند و می‌توانند وظایف نظارت و گشت‌زنی را انجام دهند.',
      'هوش مصنوعی در کسب‌وکارهای ایرانی چه نقشی خواهد داشت؟'=>'پیشرفت هوش مصنوعی در دنیا با سرعت پیش می‌رود، اما آیا این پیشرفت در کسب‌وکارهای ایرانی هم با همان سرعت رخ خواهد داد؟',
      '«بینگ» به‌لطف هوش مصنوعی به محبوب‌ترین موتور جستجوی چین تبدیل شد'=>'براساس داده‌های آماری StatCounter، مایکروسافت بینگ با پیشی‌گرفتن از «بایدو» به موتور جستجوی پیشرو دسک‌تاپ در چین تبدیل شد.',
      'نتیجه یک نظرسنجی: ۶۱ درصد آمریکایی‌ها هوش مصنوعی را تهدیدی برای آینده بشریت می‌دانند'=>'بیش از دو‌سوم آمریکا‌یی‌ها نگران تأثیرات منفی هوش مصنوعی هستند و ۶۱ درصد می‌گویند این فناوری می‌تواند تمدن بشری را تهدید کند.',
      'هوش مصنوعی می‌تواند به ما در ذهن‌خوانی کمک کند، اما باید در چنین مسیری گام برداریم؟'=>'عصب‌شناسان محاسباتی برای ذهن‌‌خوانی و رمزگشایی افکار افراد، فناوری‌های تصویربرداری از مغز را با نسخه‌ای از مدل هوش مصنوعی ChatGPT ترکیب کرده‌اند.',
      'گزارش مایکروسافت: ۴۹ درصد از کارمندان نگران تصاحب شغل خود توسط هوش مصنوعی هستند'=>'گزارش سالانه مایکروسافت نشان می‌دهد که ۴۹ درصد از کارمندان این شرکت نگران وضعیت شغلی خودشان و جایگزین شدن هوش مصنوعی هستند.'
    ];
    foreach ($posts as $key => $post){
    echo '<div class="container" dir="rtl">
    <div class="row d-flex justify-content-center py-vh-5 pb-0">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row d-flex align-items-start" data-aos="fade-right">
          <div class="col-12 col-lg-12">
            <h2 class="h3 mt-5 border-top pt-5">'.$key.'</h2>
            <p class="text-secondary">'.$post.'</p>
          </div>
        </div>
      </div>
    </div>
  </div>';
  }
    ?>

  </main>

  <footer class="bg-black border-top border-dark">
    <div class="container py-vh-4 text-secondary fw-lighter">
      <div class="row">
        <div class="col-12 col-lg-5 py-4 text-center text-lg-start">
          <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack"
              viewBox="0 0 16 16">
              <path
                d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
              <path
                d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
            </svg>
            <span class="ms-md-1 mt-1 fw-bolder me-md-5">هفته نو</span>
          </a>

        </div>
        <div class="col border-end border-dark">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="#about-body" class="link-fancy link-fancy-light">درباره ما</a>
            </li>
            <li class="nav-item">
              <a href="rules.html" class="link-fancy link-fancy-light">قوانین و مقررات</a>
            </li>

            <!-- <li class="nav-item">
              <a href="#" class="link-fancy link-fancy-light">استخدام</a>
            </li> -->
            <li class="nav-item">
              <a href="contactus.html" class="link-fancy link-fancy-light">تماس با ما</a>
            </li>
          </ul>
        </div>
        <div class="col border-end border-dark">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="#price-body" class="link-fancy link-fancy-light">قیمت گذاری</a>
            </li>
            <li class="nav-item">
              <a href="#products-body" class="link-fancy link-fancy-light">محصولات</a>
            </li>
            <li class="nav-item">
              <a href="#customers-body" class="link-fancy link-fancy-light">مشتریان</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container text-center small py-vh-2 border-top border-dark">طراحی شده توسط تیم
      <a href="https://hafteno.ir" class="link-fancy link-fancy-light" target="_blank">هفته نو</a>
    </div>
  </footer>








  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // values from 0 to 3000, with step 50ms
    });
  </script>
  <script>
    let scrollpos = window.scrollY;
    const header = document.querySelector(".navbar");
    const header_height = header.offsetHeight;

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm");
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm");

    window.addEventListener('scroll', function () {
      scrollpos = window.scrollY;

      if (scrollpos >= header_height) { add_class_on_scroll(); }
      else { remove_class_on_scroll(); }

      console.log(scrollpos);
    })
  </script>

</body>

</html>