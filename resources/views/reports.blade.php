<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التقارير والإحصائيات</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 900px;
            margin: auto;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-end">التقارير والإحصائيات</h4>

        <div class="alert alert-info">
            <h5>إجمالي الأنشطة: {{ $reports['total_activities'] }}</h5>
            <h5>إجمالي عدد المتطوعين المطلوبين: {{ $reports['total_volunteers_needed'] }}</h5>
        </div>

        <!-- يمكنك إضافة المزيد من الإحصائيات هنا -->

        <a href="{{ route('activities') }}" class="btn btn-primary">عودة إلى الأنشطة</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
