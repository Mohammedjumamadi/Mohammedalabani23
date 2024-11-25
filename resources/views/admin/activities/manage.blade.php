@section('content')
<div class="admin-section">
    <h2 style="text-align: right;" class="mb-4">إدارة الأنشطة التطوعية</h2>

    <!-- عرض الرسائل (نجاح أو خطأ) -->
    @if(session('success'))
        <div class="alert alert-success text-end">
            {{ session('success') }}
        </div>
    @endif

    <!-- نموذج إضافة نشاط جديد -->
    <div class="card shadow-lg border-0 mb-4">
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

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5 py-2">
                        <i class="fas fa-plus-circle"></i> إضافة النشاط
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- تضمين محتوى index.blade.php -->
    @include('admin.activities.index')
</div>
