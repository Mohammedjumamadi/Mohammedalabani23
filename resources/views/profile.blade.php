<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الملف الشخصي - منصة التطوع الهلال الأحمر</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            direction: rtl;
            text-align: right;
        }

        .profile-container {
            max-width: 1000px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #e10000;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            font-size: 28px;
            color: #e10000;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e10000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 90%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #e10000;
            outline: none;
            box-shadow: 0 0 5px rgba(225, 0, 0, 0.5);
        }

        .form-group .fa {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #e10000;
        }

        .form-group input {
            padding-right: 35px;
        }

        .btn {
            background-color: #e10000;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, transform 0.2s;
            width: 30%;
            height: 50px;
            border: 2px solid transparent;
        }

        .btn:hover {
            background-color: #b30000;
            border: 2px solid #e10000;
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
            text-align: right;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 767px) {
            .profile-container {
                margin: 20px;
                padding: 20px;
            }

            .profile-header h2 {
                font-size: 24px;
            }

            .btn {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .profile-container {
                margin: 10px;
                padding: 15px;
            }

            .profile-header h2 {
                font-size: 22px;
            }

            .btn {
                font-size: 14px;
                height: 45px;
            }
        }
    </style>
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('image/redu.png') }}" alt="صورة المستخدم">
        <h2>الملف الشخصي</h2>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('update_Profile') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            <i class="fa fa-user"></i>
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            <i class="fa fa-envelope"></i>
        </div>

        <div class="form-group">
            <label for="age">العمر:</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $user->age) }}" required>
            <i class="fa fa-calendar-alt"></i>
        </div>

        <div class="form-group">
            <label for="education">التعليم:</label>
            <input type="text" name="education" id="education" class="form-control" value="{{ old('education', $user->education) }}" required>
            <i class="fa fa-graduation-cap"></i>
        </div>

        <div class="form-group">
            <label for="experience">الخبرة:</label>
            <input type="text" name="experience" id="experience" class="form-control" value="{{ old('experience', $user->experience) }}" required>
            <i class="fa fa-briefcase"></i>
        </div>

        <div class="form-group">
            <label for="address">العنوان:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}" required>
            <i class="fa fa-map-marker-alt"></i>
        </div>

        <div class="form-group">
            <label for="phone">رقم الهاتف:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
            <i class="fa fa-phone"></i>
        </div>

        <div class="form-group">
            <label for="gender">الجنس:</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>

        <button type="submit" class="btn">
            <i class="fas fa-edit"></i> <!-- أيقونة التعديل -->
            حفظ التعديلات
        </button>
    </form>
</div>

</body>
</html>
