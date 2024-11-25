<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة نشاط جديد</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- إضافة أيقونات FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- إضافة Bootstrap -->
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
        }

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
            background-color: #28a745; /* لون زرين */
            text-align: center;
            color: white;
        }

        .card-body {
            background-color: #f8f9fa;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            direction: rtl; /* ضبط اتجاه النص داخل الحقول */
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
        <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-success text-white text-center">
                <h5 class="mb-0">إضافة نشاط جديد</h5>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.activities.store') }}" method="POST" class="text-right">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger text-right">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-4">
                        <label for="activityName">اسم النشاط</label>
                        <input type="text" id="activityName" name="name" class="form-control" placeholder="أدخل اسم النشاط" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="activityDescription">وصف النشاط</label>
                        <textarea id="activityDescription" name="description" class="form-control" rows="3" placeholder="أدخل وصف النشاط" required></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="activityDate">التاريخ</label>
                        <input type="date" id="activityDate" name="date" class="form-control" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="activityCity">المدينة</label>
                        <input type="text" id="activityCity" name="city" class="form-control" placeholder="أدخل المدينة" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="volunteersNeeded">عدد المتطوعين المطلوبين</label>
                        <input type="number" id="volunteersNeeded" name="volunteers_needed" class="form-control" min="1" required>
                    </div>

                    <!-- إضافة حقل المدة بالساعة والدقيقة -->
                    <div class="form-group mb-4">
                        <label for="activityDuration">المدة</label>
                        <div class="d-flex">
                            <input type="number" id="activityDurationHours" name="duration_hours" class="form-control" min="0" placeholder="الساعات" style="margin-right: 10px;" required>
                            <input type="number" id="activityDurationMinutes" name="duration_minutes" class="form-control" min="0" max="59" placeholder="الدقائق" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-5 py-2">
                            <i class="fas fa-plus-circle"></i> إضافة النشاط
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- إضافة jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> <!-- إضافة Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- إضافة Bootstrap JS -->
</body>
</html>
