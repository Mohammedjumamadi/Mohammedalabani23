<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استعادة كلمة المرور - منصة الهلال الأحمر</title>
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
        input[type="email"] {
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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- إضافة الشعار -->
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="شعار الهلال الأحمر">
        </div>

        <h2>استعادة كلمة المرور</h2>

        <!-- عرض الرسائل (النجاح أو الفشل) -->
        @if (session('status'))
            <div class="alert alert-success" style="color: #4CAF50; padding: 10px; background-color: #e8f5e9; border-radius: 5px; margin-bottom: 20px;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->has('email'))
            <div class="alert alert-danger" style="color: #f44336; padding: 10px; background-color: #fce4e4; border-radius: 5px; margin-bottom: 20px;">
                {{ $errors->first('email') }}
            </div>
        @endif

        <!-- نموذج طلب استعادة كلمة المرور -->
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="input-group">
                <i class="fas fa-envelope"></i> <!-- أيقونة البريد الإلكتروني -->
                <input type="email" id="email" name="email" placeholder="البريد الإلكتروني" required>
            </div>

            <button type="submit">إرسال رابط استعادة كلمة المرور</button>
        </form>

        <footer>
            <p>هل تذكرت كلمة المرور؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
        </footer>
    </div>
</body>
</html>
