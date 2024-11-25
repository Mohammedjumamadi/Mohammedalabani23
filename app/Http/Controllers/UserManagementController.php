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
        ]);

        // إنشاء المستخدم
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    // عرض صفحة تعديل مستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user')); // صفحة النموذج لتعديل المستخدم
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // التحقق من صحة الإدخالات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'age' => 'required|integer|min:1|max:120',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);

        // تحديث المستخدم
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
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
