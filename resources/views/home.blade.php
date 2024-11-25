<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة تطوع الهلال الأحمر</title>
    <!-- إضافة مكتبة Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
        }
        body {
            background-color: #f9f9f9;
            color: #333;
            direction: rtl;
            font-size: 16px;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #d32f2f;
            color: #fff;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
        }
        .navbar .logo img {
            width: 50px;
            margin-right: 15px;
        }
        .navbar .logo h1 {
            font-size: 26px;
            font-weight: 600;
        }
        .navbar .menu {
            display: flex;
            gap: 30px;
        }
        .navbar .menu a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }
        .navbar .menu a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #fdd835;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
        }
        .navbar .menu a:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .navbar .actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .navbar .actions input[type="text"] {
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            width: 220px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .navbar .actions input[type="text"]:focus {
            border-color: #fdd835;
            outline: none;
        }
        .navbar .actions .btn {
            background-color: #fdd835;
            color: #d32f2f;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .navbar .actions .btn:hover {
            background-color: #fbc02d;
            transform: translateY(-2px);
        }

        /* قسم الصفحة الرئيسية */
        .hero-section {
            text-align: center;
            padding: 120px 20px 60px;
            background: linear-gradient(to bottom right, #d32f2f, #fbc02d);
            color: #fff;
            margin-top: 80px;
        }
        .hero-section h2 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 18px;
            max-width: 800px;
            margin: auto;
            line-height: 1.6;
        }

        /* أقسام الموقع */
        .sections {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin: 60px 0;
            flex-wrap: wrap;
            padding: 0 20px;
        }

        .section-item {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            width: 30%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .section-item h3 {
            font-size: 24px;
            color: #d32f2f;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .section-item .section-content {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .section-item .section-content p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            max-width: 300px;
        }

        .section-item .section-content img {
            width: 150px; /* تعديل العرض */
            height: 150px; /* تعديل الارتفاع */
            object-fit: cover; /* حفظ التنسيق داخل الأبعاد المحددة */
            border-radius: 15px; /* تحديد زوايا مستديرة للصورة */
        }

        .section-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
        }

        /* تحسين استجابة التصميم */
        @media (max-width: 768px) {
            .sections {
                flex-direction: column;
                align-items: center;
            }

            .section-item {
                width: 90%;
            }

            .section-item .section-content {
                flex-direction: column;
                align-items: center;
            }

            .section-item .section-content img {
                width: 120px; /* تعديل العرض للصورة على الشاشات الصغيرة */
                height: 120px; /* تعديل الارتفاع للصورة على الشاشات الصغيرة */
            }
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 25px 20px;
            background-color: #d32f2f;
            color: #fff;
        }
        footer p {
            font-size: 14px;
        }

        /* تخصيص الأيقونات بجانب الأزرار */
        .navbar .actions .btn i {
            margin-right: 10px; /* مسافة بين الأيقونة والنص */
            font-size: 18px; /* حجم الأيقونة */
        }


.social-media a {
    color: #fff; /* لون الأيقونات */
    margin: 0 10px;
    font-size: 20px; /* حجم الأيقونة */
    transition: color 0.3s;
}

.social-media a:hover {
    color: #fdd835; /* تغيير اللون عند التحويم */
}
    </style>
</head>
<body>

    <div class="navbar">
        <div class="actions">
            <button class="btn" onclick="window.location.href='{{ route('registerForm') }}'">
                <i class="fas fa-user-plus"></i> <!-- أيقونة إنشاء حساب -->
                إنشاء حساب
            </button>
            <button class="btn" onclick="window.location.href='{{ route('login') }}'">
                <i class="fas fa-sign-in-alt"></i> <!-- أيقونة تسجيل الدخول -->
                تسجيل الدخول
            </button>

            <!-- تغيير النص إلى أيقونة البحث -->
            <input type="text" id="search-input" placeholder="بحث..." aria-label="بحث">
            <button class="btn" onclick="performSearch()">
                <i class="fas fa-search"></i> <!-- أيقونة البحث -->
            </button>

        </div>
          <!-- إضافة زر تغيير اللغة -->
        <button class="btn" onclick="changeLanguage()">
            <i class="fas fa-language"></i> <!-- أيقونة اللغة -->
            اللغة
        </button>
        <div class="logo">
            <h1>منصة تطوع الهلال الأحمر</h1>
            <img src="image\redcr.png" alt="شعار الهلال الأحمر">

        </div>

    </div>

<!-- قسم الصفحة الرئيسية -->
<div class="hero-section">
    <h2>منصة تطوع الهلال الأحمر</h2>
    <p>انضم إلى مجتمع الهلال الأحمر وكن جزءًا من عائلة تطوعية تسعى لتمكين المجتمعات وتعزيز العمل الإنساني. معًا يمكننا إحداث الفرق!</p>
</div>

<!-- أقسام الموقع -->
<div class="sections">
    <div class="section-item">
        <h3>من نحن</h3>
        <div class="section-content">
            <img src="image/red1.jfif" alt="الهلال الأحمر" class="section-image">
            <p>الهلال الأحمر هو منظمة إنسانية تهدف إلى تقديم الدعم والإغاثة للمحتاجين، من خلال العديد من المبادرات التطوعية والخيرية.</p>
        </div>
    </div>
    <div class="section-item">
        <h3>برامجنا</h3>
        <div class="section-content">
            <img src="image/red2.jfif" alt="برامجنا" class="section-image">
            <p>نقدم العديد من البرامج التي تركز على الصحة، التعليم، والإغاثة، وهي فرص رائعة للمتطوعين للمشاركة والتأثير بشكل إيجابي.</p>
        </div>
    </div>
    <div class="section-item">
        <h3>شارك معنا</h3>
        <div class="section-content">
            <img src="image/red3.jfif" alt="شارك معنا" class="section-image">
            <p>انضم إلينا اليوم وكن جزءًا من العمل الإنساني الرائع الذي يقوم به الهلال الأحمر من خلال التطوع في برامجنا المختلفة.</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 منصة تطوع الهلال الأحمر. جميع الحقوق محفوظة.</p>
    <div class="social-media">
        <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook-f"></i> <!-- أيقونة فيسبوك -->
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram"></i> <!-- أيقونة إنستغرام -->
        </a>
        <a href="https://www.twitter.com" target="_blank">
            <i class="fab fa-twitter"></i> <!-- أيقونة تويتر -->
        </a>
    </div>
</footer>


</body>
</html>
