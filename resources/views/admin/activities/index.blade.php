<div id="activitiesManagement" class="content-section content-box" style="display: block;">
    <h2 style="text-align: right;" class="mb-4">إدارة الأنشطة التطوعية </h2>

    <!-- عرض الرسائل (نجاح أو خطأ) -->
    @if(session('success'))
        <div class="alert alert-success text-end">
            {{ session('success') }}
        </div>
    @endif

     <!-- زر إضافة نشاط جديد -->
    <a href="{{ route('admin.activities.create') }}" class="btn btn-success mb-4 text-end">
        <i class="fas fa-plus-circle"></i> إضافة نشاط جديد
    </a>

    <!-- جدول الأنشطة -->
    <div class="table-container">
        <h4 class="text-end">قائمة الأنشطة</h4>
        <table class="table table-bordered table-striped text-end">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>التاريخ</th>
                    <th>المدينة</th>
                    <th>عدد المتطوعين المطلوبين</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($activities) && $activities->count() > 0)
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->id }}</td>
                            <td>{{ $activity->name }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->date }}</td>
                            <td>{{ $activity->city }}</td>
                            <td>{{ $activity->volunteers_needed }}</td>
                            <td>

                                   <!-- زر تعديل النشاط -->
                                <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn btn-warning mb-1">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center"></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- إضافة روابط Bootstrap و FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




