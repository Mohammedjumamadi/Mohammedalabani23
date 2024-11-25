<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأنشطة السابقة للمتطوعين</title>
    <style>
        /* التصميم العام */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #dc3545; /* خلفية حمراء */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            color: #fff;
        }

        /* عنوان الصفحة */
        h2 {
            font-size: 36px;
            margin-bottom: 40px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* تصميم حاوية الأنشطة */
        .activity-container {
            display: flex;
            flex-direction: row; /* عرض المربعات بشكل أفقي */
            justify-content: center; /* محاذاة العناصر للوسط */
            gap: 30px; /* مساحة بين المربعات */
            max-width: 100%; /* تأكد من أن الحاوية تأخذ كامل العرض */
            overflow-x: auto; /* يسمح بالتمرير الأفقي إذا لزم الأمر */
            padding: 10px; /* إضافة بعض الحواف */
        }

        /* تصميم بطاقات الأنشطة */
        .activity-card {
            width: 250px; /* عرض ثابت للمربعات */
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: right;
            color: #333;
        }

        .activity-card h3 {
            font-size: 24px;
            margin: 10px 0;
        }

        .activity-card p {
            font-size: 15px;
            margin: 5px 0;
        }

        /* تحسين الاستجابة */
        @media (max-width: 768px) {
            .activity-card {
                width: 90%; /* عرض أكبر على الشاشات الصغيرة */
            }
        }
    </style>
</head>
<body>

    <!-- عنوان الصفحة -->
    <h2>الأنشطة السابقة للمتطوعين</h2>

    <!-- حاوية بطاقات الأنشطة السابقة -->
    <div class="activity-container">

        <!-- بطاقة نشاط 1 -->
        <div class="activity-card">
            <h3>حملة توزيع المواد الغذائية</h3>
            <p>وصف النشاط: تم توزيع المواد الغذائية على الأسر المحتاجة في منطقتنا.</p>
            <p>التاريخ: 5 نوفمبر 2024</p>
            <p>المدة: 4 ساعات</p>
            <p>المدينة: طرابلس    </p>
        </div>

        <!-- بطاقة نشاط 2 -->
        <div class="activity-card">
            <h3>حملة تنظيف الشواطئ</h3>
            <p>وصف النشاط: نشاط يهدف إلى تنظيف الشواطئ ونشر الوعي البيئي.</p>
            <p>التاريخ: 15 أكتوبر 2024</p>
            <p>المدة: 3 ساعات</p>
            <p>الموقع: بنغازي، ليبيا</p>
        </div>

        <!-- بطاقة نشاط 3 -->
        <div class="activity-card">
            <h3>زيارة دار المسنين</h3>
            <p>وصف النشاط: زيارة دار المسنين وتقديم الهدايا والدعم النفسي للنزلاء.</p>
            <p>التاريخ: 25 سبتمبر 2024</p>
            <p>المدة: 5 ساعات</p>
            <p>الموقع: مصراتة، ليبيا</p>
        </div>

    </div>

</body>
</html>
