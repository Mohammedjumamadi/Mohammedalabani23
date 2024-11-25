<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - منصة الهلال الأحمر</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* إعدادات الصفحة العامة */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            direction: rtl;
            text-align: right;
            background-color: #f9f9f9; /* خلفية خفيفة */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 500px; /* أقصى عرض للحاوية */
            padding: 30px;
            background-color: #ffffff; /* خلفية الحاوية بيضاء */
            border: 2px solid #d32f2f; /* إطار أحمر حول الحاوية */
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: right; /* محاذاة النص لليمين */
            overflow: hidden; /* لمنع أي محتوى من الخروج */
        }
        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 70px;
        }
        h2 {
            color: #d32f2f; /* لون النص الأحمر */
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center; /* محاذاة النص في الوسط */
        }
        .form-group {
            margin-top: 15px;
            position: relative; /* لتسهيل وضع الأيقونات */
            display: flex; /* لجعل العناصر في صف */
            align-items: center; /* محاذاة العناصر في المنتصف */
        }
        label {
            margin-right: 10px; /* هوامش بين التسمية والحقل */
            font-weight: bold;
            color: #555;
            font-size: 14px;
            width: 100px; /* عرض ثابت للتسميات */
            display: flex; /* لجعل النص أفقي */
            align-items: center; /* محاذاة النص في المنتصف عموديًا */
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%; /* جعل الحقول تأخذ العرض الكامل */
            padding: 12px 12px 12px 40px; /* إضافة مسافة للأيقونة */
            margin-top: 5px; /* هوامش بين الحقل والتسمية */
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
            font-size: 14px;
            transition: border-color 0.3s;
            text-align: right; /* محاذاة النص لليمين */
        }
        input:focus, select:focus {
            border-color: #d32f2f; /* لون الإطار عند التركيز */
            outline: none;
        }
        .icon {
            position: absolute;
            left: 12px; /* موضع الأيقونة داخل الحقل */
            top: 50%;
            transform: translateY(-50%);
            color: #d32f2f; /* لون الأيقونة */
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #d32f2f; /* زر باللون الأحمر */
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #b71c1c; /* لون أغمق عند التمرير على الزر */
        }

        /* تصميم خانة الجنس */
        .gender-options {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .gender-label {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border: 2px solid #ddd;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gender-label input {
            display: none; /* إخفاء الـ radio button */
        }

        .gender-text {
            font-size: 16px;
            color: #555;
            padding-left: 8px;
        }

        .gender-label:hover {
            border-color: #d32f2f; /* تغيير اللون عند التمرير */
            background-color: #f9f9f9;
        }

        .gender-label input:checked + .gender-text {
            font-weight: bold;
            color: #d32f2f; /* تغيير اللون عند اختيار الجنس */
        }

        footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #888;
        }
        footer a {
            color: #d32f2f;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo">
            <img src="image/redcr.png" alt="شعار الهلال الأحمر">
        </div>
        <h2>إنشاء حساب</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="أدخل اسمك" required>
                <i class="icon fas fa-user"></i> <!-- أيقونة الاسم -->
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                <i class="icon fas fa-envelope"></i> <!-- أيقونة البريد الإلكتروني -->
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
                <i class="icon fas fa-lock"></i> <!-- أيقونة كلمة المرور -->
            </div>

            <div class="form-group">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" required>
                <i class="icon fas fa-lock"></i> <!-- أيقونة تأكيد كلمة المرور -->
            </div>

            <div class="form-group">
                <input type="number" id="age" name="age" placeholder="أدخل عمرك" required>
                <i class="icon fas fa-calendar-alt"></i> <!-- أيقونة العمر -->
            </div>

            <div class="form-group">
                <i class="icon fas fa-graduation-cap"></i> <!-- أيقونة المستوى التعليمي -->
                <select id="education" name="education" required>
                    <option value="basic">تعليم أساسي</option>
                    <option value="secondary">ثانوية عامة</option>
                    <option value="diploma">دبلوم</option>
                    <option value="bachelor">بكالوريوس</option>
                    <option value="master">ماجستير</option>
                    <option value="doctorate">دكتوراه</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" id="experience" name="experience" placeholder="أدخل مهنك أو خبرتك" required>
                <i class="icon fas fa-briefcase"></i> <!-- أيقونة المهنة -->
            </div>

            <div class="form-group">
                <input type="text" id="address" name="address" placeholder="ادخل عنوانك (المدينة، الشارع)" required>
                <i class="icon fas fa-map-marker-alt"></i> <!-- أيقونة العنوان -->
            </div>

            <div class="form-group">
                <input type="text" id="phone" name="phone" placeholder="أدخل رقم هاتفك" required>
                <i class="icon fas fa-phone"></i> <!-- أيقونة الهاتف -->
            </div>

            <!-- خانة الجنس -->
            <div class="form-group">
                <label>الجنس:</label>
                <div class="gender-options">
                    <label for="male" class="gender-label">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <span class="gender-text">ذكر</span>
                    </label>
                    <label for="female" class="gender-label">
                        <input type="radio" id="female" name="gender" value="female" required>
                        <span class="gender-text">أنثى</span>
                    </label>
                </div>
            </div>

            <button type="submit">إنشاء حساب</button>
        </form>

        <footer>
            <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
        </footer>
    </div>

</body>
</html>
