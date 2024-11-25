<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واجهة مدير النظام - الهلال الأحمر</title>
    <!-- ربط مكتبة Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.css" rel="stylesheet">
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

        .content-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-right: 3px solid #b22222;
        }

        .card {
            border-radius: 10px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        .btn-delete {
            background-color: #d9534f;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c9302c;
        }

        .btn-edit {
            background-color:  rgb(207, 204, 19);
            color: white;
        }

        .btn-edit:hover {
            background-color: rgb(207, 204, 19);
        }

        .chart-container {
            margin-top: 30px;
            text-align: center;
        }

        #reports {
        background-color: #f8f9fa; /* لون خلفية فاتح */
        border-radius: 8px; /* زوايا دائرية */
        padding: 20px; /* حشو داخلي */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* ظل خفيف */
    }
    .card {
        margin-bottom: 20px; /* مسافة بين البطاقات */
    }
    </style>
</head>
<body>

     <!-- ترويسة الصفحة -->
     <div class="header">
        <h1>واجهة مدير النظام</h1>
    </div>

    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <a href="#" class="active" onclick="showContent('home')">الرئيسية</a>
        <a href="#" onclick="showContent('profile')">المعلومات الشخصية</a>
        <a href="#" onclick="showContent('userManagement')">إدارة المتطوعين </a>
        <a href="#" onclick="showContent('activitiesManagement')">إدارة الأنشطة التطوعية</a>
        <a href="#" onclick="showContent('employeeManagement')">إدارة الموظفين</a>
        <a href="#" onclick="showContent('reports')">التقارير والإحصائيات</a>
        <a href="{{ route('home') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        تسجيل الخروج
     </a>
     <form id="logout-form" action="{{ route('home') }}" method="POST" style="display: none;">
         @csrf
     </form>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <!-- قسم الرئيسية -->
        <div id="home" class="content-section content-box">
            <h2 style="text-align: right;">الرئيسية</h2>

            <!-- إحصائيات المتطوعين -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">عدد المتطوعين الجدد</h5>
                            <p class="card-text" style="font-size: 2em;">25</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">عدد الأنشطة التطوعية</h5>
                            <p class="card-text" style="font-size: 2em;">15</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">عدد المتطوعين الكلي</h5>
                            <p class="card-text" style="font-size: 2em;">120</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الرسم البياني لتوزيع المتطوعين حسب الفئات -->
<div class="chart-container">
    <canvas id="volunteerChart" width="300" height="150"></canvas>
</div>

<!-- ربط مكتبات JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    // الوظيفة لإظهار وإخفاء المحتوى عند الضغط على الروابط
    function showContent(section) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(sec => {
            sec.style.display = 'none';
        });
        document.getElementById(section).style.display = 'block';
        const links = document.querySelectorAll('.sidebar a');
        links.forEach(link => {
            link.classList.remove('active');
        });
        const activeLink = document.querySelector(`.sidebar a[onclick="showContent('${section}')"]`);
        activeLink.classList.add('active');
    }

    // رسم بياني دائري لعدد المتطوعين
    const ctx = document.getElementById('volunteerChart').getContext('2d');
    const volunteerChart = new Chart(ctx, {
        type: 'pie', // تغيير النوع إلى pie أو doughnut
        data: {
            labels: ['الفئة الأولى', 'الفئة الثانية', 'الفئة الثالثة'],
            datasets: [{
                label: 'عدد المتطوعين',
                data: [10, 15, 25],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script>


            <!-- قائمة المستخدمين -->
            <div class="table-container">
                <h4 style="text-align: right;">قائمة المتطوعين </h4>
                <table class="table table-bordered table-striped text-right">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>تاريخ التسجيل </th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>أحمد محمد</td>
                            <td>ahmed@example.com</td>
                            <td>30</td>
                            <td>
                                <button class="btn btn-edit btn-sm">تعديل</button>
                                <button class="btn btn-delete btn-sm">حذف</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>مريم علي</td>
                            <td>maryam@example.com</td>
                            <td>25</td>
                            <td>
                                <button class="btn btn-edit btn-sm">تعديل</button>
                                <button class="btn btn-delete btn-sm">حذف</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- قسم المعلومات الشخصية-->

        <div id="profile" class="content-section content-box container mt-5" style="text-align: right;">
            <h2 class="text-end mb-4">المعلومات الشخصية</h2>

            <form action="{{ route('updateprofile') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> البريد الإلكتروني:</label>
                    <input type="email" id="email" name="email" class="form-control"
                    value="12312431a0@emailfoxi.pro" disabled required> <!-- البريد الإلكتروني ثابت -->

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> كلمة المرور الجديدة:</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="اتركها فارغة إذا كنت لا ترغب بالتغيير">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label"><i class="fas fa-key"></i> تأكيد كلمة المرور:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> حفظ التعديلات
                </button>
            </form>
        </div>

        <!-- إضافة روابط Bootstrap و FontAwesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



          <!-- قسم اداراة المتطوعين-->
        @section('content')
            <div class="admin-section">
                @include('admin.users.index') <!-- تضمين محتوى index.blade.php -->
            </div>



<!-- قسم اداراة الانشطة التطوعية -->
            @section('content')
<div class="admin-section">
    @include('admin.activities.index')<!-- تضمين محتوى index.blade.php -->
    </div>




<div id="employeeManagement" class="content-section" style="display: none; margin-top: 40px; direction: rtl; text-align: right;">
    <h4 class="text-center mb-4">إدارة الموظفين</h4>

    <div class="card" style="max-width: 600px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h5 class="text-center mb-4">إضافة موظف جديد</h5>

            <form id="addEmployeeForm">
                <div class="form-group">
                    <label for="employeeName">اسم الموظف:</label>
                    <input type="text" class="form-control" id="employeeName" placeholder="أدخل اسم الموظف" required>
                </div>

                <div class="form-group">
                    <label for="employeeEmail">البريد الإلكتروني:</label>
                    <input type="email" class="form-control" id="employeeEmail" placeholder="أدخل البريد الإلكتروني" required>
                </div>

                <div class="form-group">
                    <label for="employeePassword">كلمة المرور:</label>
                    <input type="password" class="form-control" id="employeePassword" placeholder="أدخل كلمة المرور" required>
                </div>

                <div class="form-group">
                    <label>صلاحيات الموظف:</label><br>
                    <div>
                        <input type="checkbox" id="manageActivities" value="manage_activities">
                        <label for="manageActivities">إدارة الأنشطة (إضافة، تعديل، حذف)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="approveRequests" value="approve_requests">
                        <label for="approveRequests">قبول/رفض طلبات التسجيل</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">إضافة موظف</button>
            </form>
        </div>
    </div>

    <div id="employeeList" class="mt-4">
        <h5 class="text-center mb-4">قائمة الموظفين:</h5>
        <div style="overflow-x: auto; max-width: 70%; margin: 0 auto;">
            <table class="table table-bordered" style="width: 80%; margin: 0 auto; text-align: center;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="width: 10%;">ID</th>
                        <th style="width: 30%;">الاسم</th>
                        <th style="width: 40%;">البريد الإلكتروني</th>
                        <th style="width: 20%;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="employees">
                    <!-- سيتم إضافة الموظفين هنا -->
                </tbody>
            </table>
        </div>
    </div>

</div>

   <!-- قسم التقارير و الإحصائيات -->
<div id="reports" class="content-section" style="display: none; margin-top: 20px; direction: rtl; text-align: right;">
    <h4 class="text-center mb-4">إحصائيات الأنشطة</h4>
    <div class="card" style="max-width: 60%; margin: 0 auto;">
        <div class="card-body">
            <div id="statistics" class="alert alert-info">
                <h5>إجمالي الأنشطة: <span id="totalActivities" style="font-weight: bold; color: #007bff;">0</span></h5>
                <h5>إجمالي عدد المتطوعين المطلوبين: <span id="totalVolunteersNeeded" style="font-weight: bold; color: #007bff;">0</span></h5>
                <h5>عدد الأنشطة التي تحتاج أكثر من 10 متطوعين: <span id="highVolunteerActivities" style="font-weight: bold; color: #007bff;">0</span></h5>
            </div>
        </div>
    </div>

    <h5 class="text-center mt-4">رسم بياني لعدد الأنشطة حسب المدينة</h5>
    <div class="card" style="max-width: 70%; margin: 0 auto; padding: 20px;">
        <div class="card-body">
            <canvas id="cityChart" style="width: 70%; max-width: 600px; margin: 0 auto;"></canvas>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="printReport()">طباعة تقرير</button>
    </div>
</div>


    <!-- ربط مكتبات JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>

function showSection(sectionId) {
    var sections = document.querySelectorAll('.content-section');
    sections.forEach(function(section) {
        section.style.display = 'none';
    });

    document.getElementById(sectionId).style.display = 'block';
}

function showContent(section) {
    if (section === 'reports') {
        fetch('/api/reports')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('totalActivities').innerText = data.total_activities;
                document.getElementById('totalVolunteersNeeded').innerText = data.total_volunteers_needed;
                document.getElementById('highVolunteerActivities').innerText = data.high_volunteer_activities;

                // رسم بياني للأنشطة حسب المدينة
                drawChart(data.activities_by_city);

                showSection('reports');
            })
            .catch(error => console.error('Error fetching reports:', error));
    } else {
        showSection(section);
    }
}

function drawChart(activitiesByCity) {
    const ctx = document.getElementById('cityChart').getContext('2d');
    const labels = Object.keys(activitiesByCity);
    const data = Object.values(activitiesByCity);

    new Chart(ctx, {
        type: 'pie', // يمكنك تغيير النوع إلى 'bar' لرسم بياني عمودي
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد الأنشطة حسب المدينة',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'عدد الأنشطة حسب المدينة'
                }
            }
        }
    });
}
        function validateProfileForm(event) {
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');

        if (!emailField.value.includes('@')) {
            event.preventDefault();
            alert("الرجاء إدخال بريد إلكتروني صالح.");
            return false;
        }

        if (passwordField.value && passwordField.value.length < 8) {
            event.preventDefault();
            alert("كلمة المرور يجب أن تكون 8 أحرف على الأقل.");
            return false;
        }

        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const profileForm = document.querySelector('#profile form');
        if (profileForm) {
            profileForm.addEventListener('submit', validateProfileForm);
        }
    });

     // مثال لاسترجاع بيانات المستخدمين عبر JSON
     fetch('/admin/users')
        .then(response => response.json())
        .then(users => {
            let tableBody = document.querySelector('#userTable tbody');
            users.forEach(user => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.age}</td>
                    <td>${user.address}</td>
                    <td>${user.phone}</td>
                    <td>
                        <form action="/admin/users/${user.id}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟');">حذف</button>
                        </form>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        });

        function printReport() {
    const printContents = document.getElementById('reports').innerHTML; // الحصول على محتويات القسم
    const originalContents = document.body.innerHTML; // حفظ المحتويات الأصلية

    document.body.innerHTML = printContents; // استبدال المحتويات الأصلية بمحتويات القسم
    window.print(); // فتح نافذة الطباعة
    document.body.innerHTML = originalContents; // استعادة المحتويات الأصلية بعد الطباعة
    location.reload(); // إعادة تحميل الصفحة للتأكد من أن كل شيء يعمل بشكل صحيح
}

let employees = []; // مصفوفة لتخزين الموظفين

// إضافة حدث عند إرسال النموذج
document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة

    const name = document.getElementById('employeeName').value;
    const email = document.getElementById('employeeEmail').value;
    const password = document.getElementById('employeePassword').value;

    // جمع الصلاحيات المحددة
    const permissions = [];
    if (document.getElementById('manageActivities').checked) {
        permissions.push('إدارة الأنشطة');
    }
    if (document.getElementById('approveRequests').checked) {
        permissions.push('قبول/رفض طلبات التسجيل');
    }

    // إضافة الموظف إلى المصفوفة
    const employee = {
        name,
        email,
        password,
        permissions: permissions.join(', ')
    };
    employees.push(employee);

    // تحديث عرض قائمة الموظفين
    updateEmployeeList();

    // إعادة تعيين النموذج
    this.reset();
});

// دالة لتحديث عرض قائمة الموظفين
function updateEmployeeList() {
    const employeeList = document.getElementById('employees');
    employeeList.innerHTML = ''; // مسح القائمة الحالية

    employees.forEach((employee, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.textContent = `${employee.name} - ${employee.email} - صلاحيات: ${employee.permissions}`;

        // زر حذف
        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger btn-sm';
        deleteButton.textContent = 'حذف';
        deleteButton.onclick = function() {
            deleteEmployee(index);
        };

        li.appendChild(deleteButton);
        employeeList.appendChild(li);
    });
}

// دالة لحذف موظف
function deleteEmployee(index) {
    employees.splice(index, 1); // إزالة الموظف من المصفوفة
    updateEmployeeList(); // تحديث القائمة
}


    </script>
</body>
</html>
