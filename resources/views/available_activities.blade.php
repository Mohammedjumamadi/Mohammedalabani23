<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأنشطة المتاحة</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7fc;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
        }

        .input-group {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        .input-group i {
            padding: 10px;
            background-color: #ddd;
            border-right: 1px solid #ccc;
        }

        .input-group input {
            padding: 10px;
            width: 200px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .activity-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .activity-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .activity-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .activity-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .activity-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .buttons button {
            padding: 8px 16px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .register-btn {
            background-color: #4CAF50;
            color: white;
        }

        .unregister-btn {
            background-color: #f44336;
            color: white;
            display: none; /* إخفاء الزر افتراضيًا */
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            display: none; /* إخفاء الرسالة افتراضيًا */
            text-align: center;
            border-radius: 5px;
        }

        .unregister-message {
            margin-top: 20px;
            padding: 15px;
            background-color: #f44336;
            color: white;
            display: none; /* إخفاء الرسالة افتراضيًا */
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>الأنشطة المتاحة</h2>

    <div class="filter-container">
        <div class="input-group">
            <i class="fas fa-clipboard-list"></i>
            <input type="text" id="activitySearch" placeholder="ابحث عن اسم النشاط">
        </div>
        <div class="input-group">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" id="citySearch" placeholder="ابحث عن المدينة">
        </div>
        <button id="filterButton">فلترة</button>
    </div>

    <div class="activity-container" id="activityContainer">
        @foreach ($activities as $activity)
            <div class="activity-card" data-activity="{{ $activity->name }}" data-city="{{ $activity->city }}">
                <img src="{{ asset('images/logo.png') }}" alt="صورة النشاط">
                <h3>{{ $activity->name }}</h3>
                <p><strong>وصف:</strong> {{ $activity->description }}</p>
                <p><strong>التاريخ:</strong> {{ $activity->date }}</p>
                <p><strong>المدة:</strong> {{ $activity->duration }} ساعات</p>
                <p><strong>المدينة:</strong> {{ $activity->city }}</p>
                <div class="buttons">
                    <button class="register-btn" onclick="register(this)">تسجيل</button>
                    <button class="unregister-btn" onclick="unregister(this)">إلغاء التسجيل</button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="message" id="messageBox">تمت عملية التسجيل بنجاح!</div>
    <div class="unregister-message" id="unregisterMessageBox">تم إلغاء التسجيل بنجاح!</div>

    <script>
        function register(button) {
            button.style.display = 'none';
            const unregisterBtn = button.parentNode.querySelector('.unregister-btn');
            unregisterBtn.style.display = 'inline-block';
            const messageBox = document.getElementById('messageBox');
            messageBox.style.display = 'block';
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 3000);
        }

        function unregister(button) {
            button.style.display = 'none';
            const registerBtn = button.parentNode.querySelector('.register-btn');
            registerBtn.style.display = 'inline-block';
            const unregisterMessageBox = document.getElementById('unregisterMessageBox');
            unregisterMessageBox.style.display = 'block';
            setTimeout(() => {
                unregisterMessageBox.style.display = 'none';
            }, 3000);
        }

        document.getElementById('filterButton').addEventListener('click', () => {
            const activitySearch = document.getElementById('activitySearch').value.toLowerCase();
            const citySearch = document.getElementById('citySearch').value.toLowerCase();
            const cards = document.querySelectorAll('.activity-card');

            cards.forEach(card => {
                const activity = card.getAttribute('data-activity').toLowerCase();
                const city = card.getAttribute('data-city').toLowerCase();
                if (activity.includes(activitySearch) && city.includes(citySearch)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
