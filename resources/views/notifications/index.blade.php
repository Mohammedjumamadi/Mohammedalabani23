

@section('content')
<div class="container mt-5">
    <div class="alert alert-info text-center mb-4">
        <strong>✨ يوجد نشاط جديد، اطلع عليه الآن! ✨</strong>
    </div>

    <h3 class="mb-4 text-danger text-end">📢 الإشعارات</h3>

    @foreach ($notifications as $notification)
    <div class="notification-card shadow-lg rounded mb-4 p-4">
        <div class="notification-header d-flex align-items-center">
            <img src="/images/logo.png" alt="شعار الهلال الأحمر" class="notification-icon me-3" width="50">
            <span class="text-danger fw-bold">النشاط: {{ $notification->data['name'] }}</span>
        </div>
        <div class="notification-body mt-3">
            <p><i class="fa fa-align-left text-primary me-2"></i> <strong>الوصف:</strong> {{ $notification->data['description'] }}</p>
            <p><i class="fa fa-calendar text-success me-2"></i> <strong>التاريخ:</strong> {{ $notification->data['date'] }}</p>
            <p><i class="fa fa-map-marker-alt text-danger me-2"></i> <strong>المدينة:</strong> {{ $notification->data['city'] }}</p>
        </div>
        <div class="notification-footer mt-4 text-end">
            <button class="btn btn-secondary" disabled>تمت قراءتها</button>
        </div>
    </div>
    @endforeach

    @if ($notifications->isEmpty())
    <div class="alert alert-warning text-center mt-4">
        <i class="fa fa-ban text-danger"></i> لا توجد إشعارات جديدة حاليًا.
    </div>
    @endif
</div>

<style>
    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        direction: rtl; /* الاتجاه من اليمين لليسار */
    }

    .alert-info {
        background-color: #e3f2fd;
        border-color: #bbdefb;
        color: #0d47a1;
        font-size: 1.2rem;
        font-weight: bold;
        border-radius: .375rem;
        padding: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: right; /* محاذاة النص إلى اليمين */
    }

    .notification-card {
        background: linear-gradient(135deg, #ffffff, #f9f9f9);
        border: 1px solid #ddd;
        border-radius: .5rem;
        padding: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        direction: rtl; /* اتجاه النصوص داخل البطاقة */
        text-align: right; /* محاذاة النصوص إلى اليمين */
    }

    .notification-header {
        font-size: 1.3rem;
        font-weight: bold;
        color: #d9534f;
        margin-bottom: 15px;
        direction: rtl; /* اتجاه النص */
        text-align: right; /* محاذاة النص إلى اليمين */
    }

    .notification-body p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #555;
        margin-bottom: 10px;
        text-align: right; /* محاذاة النصوص إلى اليمين */
        direction: rtl;
    }

    .notification-body i {
        font-size: 1.2rem;
    }

    .notification-footer {
        text-align: right; /* محاذاة الزر إلى اليمين */
        direction: rtl;
    }

    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
        font-size: 1.2rem;
        border-radius: .375rem;
        padding: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: .375rem;
    }
</style>

<script>
    document.querySelectorAll('.mark-as-read').forEach(button => {
        button.addEventListener('click', function () {
            let notificationId = this.getAttribute('data-id');

            fetch(`/notifications/mark-as-read/${notificationId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // إزالة البطاقة من الصفحة
                    this.closest('.notification-card').remove();
                } else {
                    alert('حدث خطأ أثناء تحديث الإشعار.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('فشل الاتصال بالخادم.');
            });
        });
    });
</script>
