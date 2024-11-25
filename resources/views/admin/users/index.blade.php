<div id="userManagement" class="content-section content-box" style="display: block;">

    @if(session('success'))
        <div class="alert alert-success" role="alert" style="text-align: right;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert" style="text-align: right;">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="btn btn-success" style="margin-bottom: 20px;">
        <i class="fas fa-user-plus"></i> إضافة مستخدم جديد
    </a>

    <!-- جدول المستخدمين -->
    <div class="table-container">
        <h4 style="text-align: right;">قائمة المتطوعين</h4>
        <table class="table table-bordered table-striped text-right">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>العمر</th>
                    <th>العنوان</th>
                    <th>المستوي التعليمي</th>
                    <th>الخبرة أو المهنة</th>
                    <th>رقم الهاتف</th>
                    <th>الجنس</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->education }}</td>
                        <td>{{ $user->experience}}</td>
                        <td>{{ $user->gender}}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }} <!-- لتصفح الصفحات -->
    </div>
</div>

<!-- إضافة روابط Bootstrap و FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
