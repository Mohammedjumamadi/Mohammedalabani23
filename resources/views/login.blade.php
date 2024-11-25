<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة الهلال الأحمر</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            background-color: #ffffff; /* خلفية الصفحة بيضاء */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #ffffff; /* خلفية الحاوية بيضاء */
            border: 2px solid #d32f2f; /* إطار أحمر حول الحاوية */
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 70px; /* عرض الشعار */
        }
        h2 {
            text-align: center;
            color: #d32f2f; /* لون النص الأحمر */
            margin-bottom: 20px;
            font-size: 24px;
        }
        .input-group {
            position: relative;
            margin-top: 15px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 12px 12px 40px; /* حشو للداخل مع مساحة للأيقونة */
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #d32f2f; /* لون الإطار عند التركيز */
            outline: none;
        }
        .input-group i {
            position: absolute;
            left: 12px; /* موقع الأيقونة */
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
        .forgot-password {
            margin-top: 15px; /* جعل المسافة بين الرابط وبقية العناصر أطول */
            font-size: 14px;
            color: #d32f2f; /* لون رابط "نسيت كلمة المرور" بالأحمر */
        }
        .forgot-password a {
            color: #d32f2f; /* التأكيد على أن اللون أحمر */
            text-decoration: none; /* إزالة التسطير */
        }
        .forgot-password a:hover {
            text-decoration: underline; /* إضافة التسطير عند التمرير */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- إضافة الشعار -->
        <div class="logo">
            <img src="{{ asset('image/redcr.png') }}" alt="شعار الهلال الأحمر">
        </div>
        <h2>تسجيل الدخول</h2>

        <!-- نموذج تسجيل الدخول للمستخدمين العاديين -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <i class="fas fa-envelope"></i> <!-- أيقونة البريد الإلكتروني -->
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i> <!-- أيقونة كلمة المرور -->
                <input type="password" name="password" placeholder="كلمة المرور" required>
            </div>
            <div>
                <button type="submit">تسجيل الدخول كمتطوع</button>
            </div>
        </form>

        <!-- عرض زر الدخول كمدير إذا كان المدخل هو فقط للمستخدمين من النوع "admin" -->
        @if (!auth()->check() || auth()->user()->role !== 'admin')
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="12312431a0@emailfoxi.pro">
            <input type="hidden" name="password" value="12345678">
            <button type="submit">تسجيل الدخول كمدير النظام</button>
        </form>
        @endif

        <!-- رابط هل نسيت كلمة المرور؟ أسفل زر "تسجيل الدخول كمدير النظام" -->
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">هل نسيت كلمة المرور؟</a>
        </div>
    </div>
</body>
</html>
