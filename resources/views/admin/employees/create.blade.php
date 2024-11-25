<div class="container mt-4" style="direction: rtl; text-align: right;">
    <h5 class="text-center mb-4">إضافة موظف جديد</h5>

    <form method="POST" action="{{ route('admin.employees.store') }}">
        @csrf
        <div>
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <label for="roles">الصلاحيات</label>
            <select name="roles[]" multiple>
                <option value="create_activity">إضافة نشاط</option>
                <option value="edit_activity">تعديل نشاط</option>
                <option value="delete_activity">حذف نشاط</option>
            </select>
        </div>
        <button type="submit">إضافة موظف</button>
    </form>

</div>
