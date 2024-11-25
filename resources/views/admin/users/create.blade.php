<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مستخدم جديد</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- أيقونات FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
    <style>
        .container {
            max-width: 900px;
            margin: auto;
            padding: 15px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            border: none;
        }

        .card-header {
            background-color: #d32f2f;
            text-align: center;
            color: white;
        }

        .card-body {
            background-color: #f8f9fa;
        }

        .form-group label {
            font-size: 16px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            direction: rtl; /* ضبط اتجاه النص داخل الحقول */
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 10px;
            direction: rtl; /* ضبط اتجاه النص داخل الأيقونات */
        }

        .btn-danger {
            background-color: #d32f2f;
            border-color: #d32f2f;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-danger:hover {
            background-color: #c62828;
            border-color: #c62828;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-right mb-4" style="color: #d32f2f; font-weight: bold; font-size: 28px;">إضافة مستخدم جديد</h2>

        @if($errors->any())
            <div class="alert alert-danger text-right">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-danger text-white text-center">
                <h5 class="mb-0">نموذج إضافة مستخدم</h5>
            </div>
            <div class="card-body p-5" style="background: #f8f9fa;">
                <form action="{{ route('admin.users.store') }}" method="POST" class="text-right">
                    @csrf
                    <!-- الاسم -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label" style="font-weight: bold; font-size: 16px;">الاسم <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="أدخل الاسم الكامل" required>
                        </div>
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="form-group mb-4">
                        <label for="email" class="form-label" style="font-weight: bold; font-size: 16px;">البريد الإلكتروني <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <!-- العمر -->
                    <div class="form-group mb-4">
                        <label for="age" class="form-label" style="font-weight: bold; font-size: 16px;">العمر <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="number" class="form-control" id="age" name="age" placeholder="أدخل العمر" required>
                        </div>
                    </div>

                    <!-- العنوان -->
                    <div class="form-group mb-4">
                        <label for="address" class="form-label" style="font-weight: bold; font-size: 16px;">العنوان <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="address" name="address" placeholder="أدخل العنوان" required>
                        </div>
                    </div>

                    <!-- رقم الهاتف -->
                    <div class="form-group mb-4">
                        <label for="phone" class="form-label" style="font-weight: bold; font-size: 16px;">رقم الهاتف <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
                        </div>
                    </div>

                    <!-- المستوى التعليمي -->
                    <div class="form-group mb-4">
                        <label for="education" class="form-label" style="font-weight: bold; font-size: 16px;">المستوى التعليمي <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-graduation-cap"></i></span>
                            </div>
                            <select class="form-control" id="education" name="education" required>
                                <option value="" selected disabled>اختر المستوى التعليمي</option>
                                <option value="ثانوي">التعليم الاساسي</option>
                                <option value="ثانوي">ثانوي</option>
                                <option value="دبلوم">دبلوم</option>
                                <option value="بكالوريوس">بكالوريوس</option>
                                <option value="ماجستير">ماجستير</option>
                                <option value="دكتوراه">دكتوراه</option>
                            </select>
                        </div>
                    </div>

                    <!-- الخبرة أو المهنة -->
                    <div class="form-group mb-4">
                        <label for="profession" class="form-label" style="font-weight: bold; font-size: 16px;">الخبرة أو المهنة <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-briefcase"></i></span>
                            </div>
                            <input type="text" class="form-control" id="profession" name="profession" placeholder="أدخل الخبرة أو المهنة" required>
                        </div>
                    </div>

                    <!-- الجنس -->
                    <div class="form-group mb-4">
                        <label for="gender" class="form-label" style="font-weight: bold; font-size: 16px;">الجنس <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-venus-mars"></i></span>
                            </div>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="ذكر">ذكر</option>
                                <option value="أنثى">أنثى</option>
                            </select>
                        </div>
                    </div>

                    <!-- كلمة المرور -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label" style="font-weight: bold; font-size: 16px;">كلمة المرور <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة المرور" required>
                        </div>
                    </div>

                    <!-- زر الإرسال -->
                    <button type="submit" class="btn btn-danger btn-block mt-4">إضافة المستخدم</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
