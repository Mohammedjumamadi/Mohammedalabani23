<div class="container mt-4" style="direction: rtl; text-align: right;">
    <h4 class="text-center mb-4">إدارة الموظفين</h4>

    <a href="{{ route('admin.employees.create') }}" class="btn btn-success mb-4">إضافة موظف جديد</a>

    @if(session('success'))
        <div class="alert alert-success text-end">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
