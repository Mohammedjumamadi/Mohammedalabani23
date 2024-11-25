<?php
// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmployeeController;

Route::get('/home', function () {
    return view('home');  // صفحة home
})->name('home');

// مسار لعرض صفحة التسجيل
Route::get('/register', function () {
    return view('register');  // عرض نموذج التسجيل
})->name('registerForm');

// مسار POST لمعالجة التسجيل
Route::post('/register', [AuthController::class, 'register'])->name('register');

// مسار POST لتسجيل الدخول
Route::post('/login', [AuthController::class, 'login'])->name('login');

// مسار لعرض صفحة تسجيل الدخول
Route::get('/login', function () {
    return view('login');  // عرض صفحة تسجيل الدخول
})->name('login');

// مسار POST لتسجيل الدخول
Route::post('/login', [AuthController::class, 'login'])->name('login');

// مسار لعرض صفحة الأنشطة
Route::get('/activities', function () {
    return view('activities');  // عرض صفحة الأنشطة
})->name('activities');


Route::get('/available-activities', [ActivityController::class, 'availableActivities'])->name('available-activities');

// مسار صفحة الأنشطة السابقة
Route::get('/previous-activities', function () {
    return view('previous_activities'); // عرض صفحة الأنشطة السابقة
})->name('previous-activities');

// مسار عند الضغط علي شارك معنا ترفعني ل صفحة التسجيل
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerForm');

// مسار صفحة مدير النظام - محمي بالـ middleware
Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('auth'); // تأكد من حماية الصفحة

// مسار صفحة موظف الهلال الأحمر
Route::get('/employee', function () {
    return view('employee');
});

// مسارات مرتبطة بالـ middleware 'auth' للمستخدمين المسجلين فقط
Route::middleware(['auth'])->group(function () {
    // مسار عرض الملف الشخصي
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    // مسار تحديث الملف الشخصي
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('update_Profile');
});

// مسارات إعادة تعيين كلمة المرور
Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

// اختبار إرسال البريد الإلكتروني
Route::get('/test-email', function () {
    Mail::raw('هذه رسالة اختبارية من منصة الهلال الأحمر', function ($message) {
        $message->to('email@example.com')
                ->subject('اختبار إرسال البريد');
    });
    return 'تم إرسال الرسالة بنجاح';
});
 // مسار تسجيل الخروج للمتطوع
Route::post('/home', [AuthController::class, 'logout'])->name('home');


Route::middleware(['auth'])->group(function () {
    // عرض صفحة الملف الشخصي
    Route::get('admin/profile', [ProfileController::class, 'showProfile'])->name('profile');

    // تحديث البيانات الشخصية
    Route::post('admin/profile', [ProfileController::class, 'updateProfile'])->name('updateprofile');
});


// عرض قائمة المستخدمين
Route::get('/admin', [UserManagementController::class, 'index'])->name('admin')->middleware('auth');

// عرض نموذج إنشاء مستخدم
Route::get('/admin/users/create', [UserManagementController::class, 'create'])->name('admin.users.create')->middleware(middleware: 'auth');

// تخزين بيانات المستخدم
Route::post('/admin/users', [UserManagementController::class, 'store'])->name('admin.users.store')->middleware('auth');

// عرض نموذج تعديل مستخدم
Route::get('/admin/users/{id}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit')->middleware('auth');

// تحديث بيانات المستخدم
Route::put('/admin/users/{id}', [UserManagementController::class, 'update'])->name('admin.users.update')->middleware('auth');

// حذف المستخدم
Route::delete('/admin/users/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy')->middleware('auth');





Route::prefix('admin')->group(function () {
    // عرض قائمة الأنشطة
    Route::get('/activities', [ActivityController::class, 'index'])->name('admin.activities.index');

    // عرض صفحة إنشاء نشاط جديد
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');

    // تخزين النشاط الجديد
    Route::post('/activities', [ActivityController::class, 'store'])->name('admin.activities.store');

    // عرض صفحة تعديل النشاط
    Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('admin.activities.edit');

    // تحديث النشاط
    Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('admin.activities.update');

    // حذف نشاط
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');
});





// مسار تسجيل الخروج للمدير النظام
Route::post('/home', [AuthController::class, 'logout'])->name('home');





use App\Models\Activity;

Route::get('/api/reports', function () {
    $activities = Activity::all();
    $totalActivities = $activities->count();
    $totalVolunteersNeeded = $activities->sum('volunteers_needed');

    // إحصائيات إضافية
    $activitiesByCity = $activities->groupBy('city')->map(function($group) {
        return $group->count();
    });

    $highVolunteerActivities = $activities->where('volunteers_needed', '>', 10)->count();

    return response()->json([
        'total_activities' => $totalActivities,
        'total_volunteers_needed' => $totalVolunteersNeeded,
        'high_volunteer_activities' => $highVolunteerActivities,
        'activities_by_city' => $activitiesByCity,
    ]);
})->name('api.reports');







// صفحة الإشعارات (للمستخدم)
Route::get('/notifications', function () {
    $notifications = auth()->user()->unreadNotifications;
    return view('notifications', compact('notifications'));
})->middleware('auth')->name('notifications');




Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications')->middleware('auth');


Route::middleware('auth')->get('/notifications', function () {
    $notifications = auth()->user()->unreadNotifications;
    return view('notifications.index', compact('notifications'));
})->name('notifications');




    // عرض الإشعارات
Route::get('/notifications', [NotificationController::class, 'index'])
->name('notifications')
->middleware('auth');

// تحديث حالة الإشعار عند قراءته
Route::post('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])
->middleware('auth');




Route::prefix('admin')->group(function () {
    // عرض قائمة الموظفين
    Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');

    // عرض صفحة إضافة موظف جديد
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');

    // تخزين الموظف الجديد
    Route::post('/employees', [EmployeeController::class, 'store'])->name('admin.employees.store');

    // حذف موظف
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');

    // الأنشطة
    Route::get('/activities', [ActivityController::class, 'index'])->name('admin.activities.index');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('admin.activities.store');
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');
});

