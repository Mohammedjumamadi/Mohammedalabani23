<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> موظف الهلال الأحمر</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #b22222;
            color: #fff;
            padding: 15px;
            text-align: right;
            font-size: 1.5em;
            position: relative;
        }

        .header h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            color: #fff;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #eee;
            position: fixed;
            height: 100%;
            top: 0;
            right: 0;
            padding-top: 20px;
            border-left: 3px solid #b22222;
        }

        .sidebar a {
            display: block;
            color: #333;
            padding: 15px;
            text-decoration: none;
            text-align: center;
            font-size: 1em;
            margin: 10px;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #b22222;
            color: #fff;
        }

        .main-content {
            margin-right: 270px;
            padding: 20px;
        }

        .profile-box, .activity-management-box, .registration-requests-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            border-right: 5px solid #b22222;
        }

        .profile-header, .activity-header, .request-header {
            text-align: center;
            margin-bottom: 20px;
            color: #b22222;
        }

        .profile-header h2, .activity-header h2, .request-header h2 {
            font-size: 28px;
        }

        .btn-edit, .btn-add, .btn-delete, .btn-accept, .btn-reject {
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-edit { background-color: rgb(207, 204, 19); }
        .btn-add { background-color: #5cb85c; }
        .btn-delete { background-color: #d9534f; }
        .btn-accept { background-color: #28a745; }
        .btn-reject { background-color: #dc3545; }

        .btn-edit:hover { background-color: rgb(190, 185, 30); }
        .btn-add:hover { background-color: #4cae4c; }
        .btn-delete:hover { background-color: #c9302c; }
        .btn-accept:hover { background-color: #218838; }
        .btn-reject:hover { background-color: #c82333; }

        .icon { color: #b22222; font-size: 1.3em; margin-left: 10px; }
    </style>
</head>
<body>

    <!-- ترويسة الصفحة -->
    <div class="header">
        <h1>واجهة موظف الهلال الأحمر</h1>
    </div>

    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <a href="#" onclick="showContent('profile')" class="active">المعلومات الشخصية</a>
        <a href="#" onclick="showContent('activitiesManagement')">إدارة الأنشطة التطوعية</a>
        <a href="#" onclick="showContent('registrationRequests')">طلبات التسجيل</a>
        <a href="#">تسجيل الخروج</a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <!-- قسم المعلومات الشخصية -->
        <div id="profile" class="profile-box">
            <div class="profile-header">
                <h2><i class="fa fa-user icon"></i> المعلومات الشخصية</h2>
                <p>تفاصيل حسابك وبيانات الاتصال الخاصة بك</p>
            </div>
            <div class="profile-info">
                <div class="row">
                    <div class="col-md-4"><label><i class="fa fa-envelope icon"></i> البريد الإلكتروني:</label></div>
                    <div class="col-md-8">example@example.com</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><label><i class="fa fa-key icon"></i> كلمة المرور:</label></div>
                    <div class="col-md-8">******** <button class="btn btn-edit btn-sm ml-3"><i class="fa fa-edit"></i> تعديل</button></div>
                </div>
            </div>
        </div>

        <!-- قسم إدارة الأنشطة التطوعية -->
        <div id="activitiesManagement" class="activity-management-box" style="display: none;">
            <div class="activity-header">
                <h2><i class="fa fa-calendar icon"></i> إدارة الأنشطة التطوعية</h2>
                <p>إضافة، تعديل وحذف الأنشطة التطوعية</p>
            </div>
            <button class="btn btn-add mb-3"><i class="fa fa-plus"></i> إضافة نشاط</button>
            <div class="table-responsive">
                <table class="table table-bordered text-right">
                    <thead class="thead-dark">
                        <tr>
                            <th>اسم النشاط</th>
                            <th>وصف النشاط</th>
                            <th>التاريخ</th>
                            <th>المدة</th>
                            <th>المدينة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>نشاط تطوعي 1</td>
                            <td>وصف مختصر للنشاط</td>
                            <td>2024-11-15</td>
                            <td>3 ساعات</td>
                            <td>طرابلس</td>
                            <td>
                                <button class="btn btn-edit btn-sm"><i class="fa fa-edit"></i> تعديل</button>
                                <button class="btn btn-delete btn-sm"><i class="fa fa-trash"></i> حذف</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- قسم طلبات التسجيل -->
        <div id="registrationRequests" class="registration-requests-box" style="display: none;">
            <div class="request-header">
                <h2><i class="fa fa-users icon"></i> طلبات التسجيل</h2>
                <p>قبول أو رفض طلبات التسجيل في الأنشطة</p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-right">
                    <thead class="thead-dark">
                        <tr>
                            <th>اسم المتطوع</th>
                            <th>النشاط</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>محمد علي</td>
                            <td>نشاط تطوعي 1</td>
                            <td>2024-11-15</td>
                            <td>
                                <button class="btn btn-accept btn-sm"><i class="fa fa-check"></i> قبول</button>
                                <button class="btn btn-reject btn-sm"><i class="fa fa-times"></i> رفض</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        function showContent(sectionId) {
            document.getElementById('profile').style.display = 'none';
            document.getElementById('activitiesManagement').style.display = 'none';
            document.getElementById('registrationRequests').style.display = 'none';
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>

</body>
</html>
