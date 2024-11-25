<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserManagementController extends Controller
{
    // عرض صفحة المستخدمين مع تحقق صلاحيات الإدارة
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'ليس لديك صلاحية لعرض هذه الصفحة');
        }

        $users = User::paginate(10);
        return view('admin', compact('users')); // عرض قائمة المستخدمين
    }

    // عرض صفحة إنشاء مستخدم جديد
    public function create()
    {
        return view('admin.users.create'); // صفحة النموذج لإضافة المستخدم
    }

// تخزين مستخدم جديد
public function store(Request $request)
{
    // التحقق من صحة الإدخالات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'age' => 'required|integer|min:1|max:120',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
        'national_id' => 'required|string|unique:users', // إضافة التحقق من الفريد للرقم الوطني
    ]);

    // التحقق إذا كان الرقم الوطني موجود مسبقًا
    $existingUser = User::where('national_id', $request->national_id)->first();
    if ($existingUser) {
        return redirect()->back()->with('error', 'الرقم الوطني موجود بالفعل.');
    }

    // إنشاء المستخدم
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'age' => $request->age,
        'address' => $request->address,
        'phone' => $request->phone,
        'education' => $request->education,
        'experience' => $request->experience,
        'gender' => $request->gender,
        'national_id' => $request->national_id,
        'volunteer_type' => $request->volunteer_type,
    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('admin')->with('success', 'تم إضافة المستخدم بنجاح');
}


public function edit($id)
{
    // جلب بيانات المستخدم باستخدام الـ id
    $user = User::findOrFail($id);

    // عرض صفحة التعديل مع البيانات
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    // جلب بيانات المستخدم باستخدام الـ id
    $user = User::findOrFail($id);

    // التحقق من صحة الإدخالات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'age' => 'required|integer|min:1|max:120',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
        'education' => 'required|string',
        'profession' => 'required|string|max:255',
        'gender' => 'required|in:ذكر,أنثى',
        'national_id' => 'required|string|max:20|regex:/^[0-9]+$/',
        'volunteer_type' => 'required|string|in:technical,physical,psychological,social,administrative,media,medical,educational',
    ]);

    // تحديث بيانات المستخدم
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'address' => $request->address,
        'phone' => $request->phone,
        'education' => $request->education,
        'profession' => $request->profession,
        'gender' => $request->gender,
        'national_id' => $request->national_id,
        'volunteer_type' => $request->volunteer_type,
    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('admin')->with('success', 'تم تحديث المستخدم بنجاح');
}

    // حذف مستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
