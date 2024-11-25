<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأنشطة للمتطوعين</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* التصميم العام */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            font-size: 16px;
        }

        /* الشريط العلوي */
        .navbar {
            width: 100%;
            background-color: #d32f2f;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .navbar img {
            width: 45px;
            margin-right: 15px;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: 600;
        }
        .navbar .dropdown {
            position: relative;
        }
        .navbar .icon {
            font-size: 26px;
            cursor: pointer;
            margin-left: 15px;
            transition: color 0.3s ease;
        }
        .navbar .icon:hover {
            color: #fdd835;
        }

        /* زر الإشعارات */
        .notification-btn {
            background-color: #fbc02d;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            position: relative;
            display: flex;
            align-items: center;
        }
        .notification-btn:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }
        .notification-btn .badge {
            background-color: #ff4081;
            color: #fff;
            border-radius: 50%;
            padding: 4px 8px;
            margin-left: 8px;
            font-size: 14px;
            position: absolute;
            top: -5px;
            right: -10px;
        }

        /* القائمة المنسدلة */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: #fff;
            width: 250px;
            border-radius: 5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-menu.active {
            display: block;
        }

        .dropdown-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .dropdown-menu ul li {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            color: #333;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu ul li:hover {
            background-color: #f5f5f5;
        }

        /* محتوى الصفحة */
        .content {
            padding: 40px 20px;
            width: 90%;
            max-width: 1000px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
            animation: fadeInUp 1s ease-out forwards;
        }

        .content h2 {
            font-size: 32px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .activity-sections {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 30px;
        }

        .activity-sections div {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 48%;
            font-size: 18px;
            color: #333;
            text-align: center;
        }

        .activity-sections div:hover {
            background-color: #fdd835;
            transform: translateY(-5px);
        }

        .activities-content {
            font-size: 18px;
            color: #666;
            line-height: 1.8;
        }

        /* تحسين تأثير fadeIn */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* تحسين الأزرار داخل المحتوى */
        .btn {
            padding: 12px 25px;
            background-color: #d32f2f;
            color: #fff;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #fbc02d;
            transform: translateY(-3px);
        }

        /* تحسين الاستجابة */
        @media (max-width: 768px) {
            .activity-sections {
                flex-direction: column;
                align-items: center;
            }

            .activity-sections div {
                width: 80%;
                margin-bottom: 15px;
            }

            .content {
                margin-top: 50px;
                width: 100%;
            }
        }

        .notification {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.notification:hover {
    background-color: #f1f1f1;
    transform: translateY(-5px);
}

.notification-header {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.notification-body p {
    font-size: 14px;
    margin: 5px 0;
}

.notification-footer {
    text-align: right;
    margin-top: 10px;
}

.mark-as-read {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.mark-as-read:hover {
    background-color: #0056b3;
}

    </style>
    <script>
        // تفعيل القائمة المنسدلة عند النقر على أيقونة الثلاث شرطات
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("active");
        }
    </script>
</head>
<body>

    <!-- الشريط العلوي -->
    <div class="navbar">
        <div class="logo">
            <img src="image/redcr.png" alt="شعار الهلال الأحمر"> <!-- الشعار -->
            <div>منصة تطوع الهلال الأحمر</div>
        </div>

        <div style="display: flex; align-items: center; position: relative;">
            <!-- أيقونة الإشعارات -->
            <div style="position: relative; margin-right: 20px;">
                <a href="{{ route('notifications') }}" style="text-decoration: none; color: inherit;">
                    <i class="fa fa-bell" style="font-size: 24px;"></i> <!-- أيقونة الإشعارات -->
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <span style="
                            position: absolute;
                            top: -5px;
                            right: -10px;
                            background-color: red;
                            color: white;
                            border-radius: 50%;
                            padding: 5px 8px;
                            font-size: 12px;
                            font-weight: bold;
                        ">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>
            </div>
        </div>



            <div class="dropdown" onclick="toggleDropdown()">
                ☰ <!-- ثلاث شرطات القائمة الجانبية -->
                <div id="dropdownMenu" class="dropdown-menu">
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> الصفحة الرئيسية</a></li>
                        <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> الحساب الشخصي</a></li>
                        <li><i class="fas fa-clipboard-list"></i> الأنشطة المسجلة</li>
                        <li><i class="fas fa-file-alt"></i> طلبات التسجيل</li>
                        <li>
                            <a href="{{ route('home') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt"></i> <!-- أيقونة تسجيل الخروج -->
                               تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('home') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- محتوى الصفحة -->
    <div class="content">
        <h2>الأنشطة للمتطوعين</h2>

        <!-- أقسام الأنشطة -->
        <div class="activity-sections">
            <div onclick="window.location.href='{{ route('available-activities') }}'">الأنشطة المتاحة</div> <!-- تغيير إلى div -->
            <div onclick="window.location.href='{{ route('previous-activities') }}'">الأنشطة السابقة</div> <!-- تغيير إلى div -->
        </div>

        <!-- محتوى الأنشطة -->
        <div class="activities-content text-center"
             style="padding: 30px; background-color: #ffffff; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto; margin-top: 20px;">
            <h3 style="color: #e74c3c; font-family: 'Cairo', sans-serif; font-weight: bold; margin-bottom: 20px;">استكشاف الأنشطة التطوعية</h3>
            <p style="color: #34495e; font-size: 1.2rem; line-height: 1.8; margin-bottom: 25px;">
                شارك في إحداث تغيير إيجابي! استعرض الأنشطة المتاحة، وانضم إلى الفعاليات المجتمعية أو تعرف على قصص النجاح من المبادرات السابقة.
            </p>
            <!-- زر عرض المزيد -->
            <button id="showMoreBtn" class="btn btn-primary"
                    style="background-color: #e74c3c; color: #fff; border: none; padding: 12px 25px; font-size: 1.1rem; border-radius: 50px; cursor: pointer; transition: all 0.3s ease;"
                    onclick="showMore()">
                عرض المزيد
            </button>
            <div id="extraInfo" style="display: none; margin-top: 30px; padding: 20px; background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: right;">
                <h4 style="color: #2c3e50; font-weight: bold; margin-bottom: 15px;">لمحة عن الأنشطة:</h4>
                <ul style="color: #7f8c8d; font-size: 1rem; line-height: 1.6; list-style-type: disc; margin-right: 20px;">
                    <li><strong style="color: #e74c3c;">الأنشطة المتاحة:</strong> فعاليات جديدة تُلبي احتياجات المجتمع وتتيح لك فرصة المشاركة، مثل حملات التوعية الصحية، جمع التبرعات، وتنظيم ورش العمل.</li>
                    <li><strong style="color: #e74c3c;">الأنشطة السابقة:</strong> مبادرات ناجحة حققت تأثيرًا ملموسًا، مثل توزيع المساعدات الإنسانية، تنظيف الشواطئ، وحملات زراعة الأشجار.</li>
                    <li><strong style="color: #e74c3c;">أهدافنا:</strong> تعزيز قيم العطاء والمساهمة في بناء مجتمع مترابط يدعم التطوع كقيمة إنسانية.</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function showMore() {
            // إظهار النبذة الإضافية
            document.getElementById('extraInfo').style.display = 'block';
            // إخفاء زر "عرض المزيد"
            document.getElementById('showMoreBtn').style.display = 'none';
        }


        document.querySelectorAll('.mark-as-read').forEach(function(button) {
    button.addEventListener('click', function() {
        var notificationId = this.getAttribute('data-id');

        fetch('/notifications/' + notificationId + '/read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: notificationId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.parentElement.parentElement.style.opacity = 0.5;
                this.setAttribute('disabled', 'true');
                this.innerText = 'تمت قراءتها';
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

    </script>

</body>
</html>
