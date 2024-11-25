<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - الهلال الأحمر</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            direction: rtl;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background: #ffffff;
            display: flex;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #e74c3c;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .logo img {
            width: 100px;
            margin-bottom: 20px;
        }
        .logo h2 {
            color: #fff;
            margin: 0;
        }
        .form-container {
            width: 70%;
            padding: 40px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-group {
            width: 48%;
            position: relative;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group .icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #e74c3c; /* لون الأيقونات أحمر */
        }
        .form-group label {
            font-size: 14px;
            color: #333;
        }
        .form-group select {
            padding-right: 10px;
        }
        .gender-options {
            display: flex;
            justify-content: space-between;
        }
        .gender-label {
            display: flex;
            align-items: center;
        }
        .gender-text {
            margin-left: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c0392b;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        footer a {
            color: #e74c3c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="image/redcr.png" alt="شعار الهلال الأحمر">
            <h2>إنشاء حساب</h2>
        </div>
        <div class="form-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-user"></i>
                        <input type="text" id="name" name="name" placeholder="أدخل اسمك" required>
                    </div>
                    <div class="form-group">
                        <i class="icon fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
                    </div>
                    <div class="form-group">
                        <i class="icon fas fa-lock"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-calendar-alt"></i>
                        <input type="number" id="age" name="age" placeholder="أدخل عمرك" required>
                    </div>
                    <div class="form-group">
                        <i class="icon fas fa-graduation-cap"></i>
                        <select id="education" name="education" required>
                            <option value="basic">تعليم أساسي</option>
                            <option value="secondary">ثانوية عامة</option>
                            <option value="diploma">دبلوم</option>
                            <option value="bachelor">بكالوريوس</option>
                            <option value="master">ماجستير</option>
                            <option value="doctorate">دكتوراه</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-briefcase"></i>
                        <input type="text" id="experience" name="experience" placeholder="أدخل مهنك أو خبرتك" required>
                    </div>
                    <div class="form-group">
                        <i class="icon fas fa-map-marker-alt"></i>
                        <input type="text" id="address" name="address" placeholder="ادخل عنوانك (المدينة، الشارع)" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-phone"></i>
                        <input type="text" id="phone" name="phone" placeholder="أدخل رقم هاتفك" required>
                    </div>
                    <div class="form-group">
                        <i class="icon fas fa-id-card"></i>
                        <input type="text" id="national_id" name="national_id" placeholder="أدخل رقمك الوطني" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <i class="icon fas fa-hands-helping"></i>
                        <select id="volunteer_type" name="volunteer_type" required>
                            <option value="technical">الدعم الفني</option>
                            <option value="physical">الدعم الجسدي</option>
                            <option value="psychological">الدعم النفسي</option>
                            <option value="social">الدعم الاجتماعي</option>
                            <option value="administrative">الدعم الإداري</option>
                            <option value="media">الدعم الإعلامي</option>
                            <option value="medical">الدعم الطبي</option>
                            <option value="educational">الدعم التعليمي والتوعوي</option>
                        </select>
                    </div>
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
                </div>

                <button type="submit">إنشاء حساب</button>
            </form>

            <footer>
                <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
            </footer>
        </div>
    </div>
</body>
</html>
