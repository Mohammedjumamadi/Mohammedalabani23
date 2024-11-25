<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    // عرض معلومات المستخدم
    public function showProfile()
    {
        // الحصول على بيانات المستخدم الحالي
        $user = Auth::user(); // يتم جلب بيانات المستخدم كما هي من قاعدة البيانات

        // لا حاجة لتعيين البريد الإلكتروني يدويًا هنا
        // يتم عرض بيانات المستخدم بشكل طبيعي في الملف view

        return view('profile', compact('user')); // تأكد من أن الملف هو resources/views/profile.blade.php
    }

    // تحديث بيانات المستخدم
    public function updateProfile(Request $request)
    {
        // طباعة المدخلات القادمة من النموذج أثناء التطوير (يمكن حذفها لاحقًا)
        Log::info('Request data: ', $request->all());

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'password' => 'nullable|string|min:8|confirmed', // التحقق من كلمة المرور الجديدة
        ]);

        // الحصول على المستخدم الحالي
        $user = Auth::user();

        // إذا تم إدخال كلمة مرور جديدة
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password')); // تشفير كلمة المرور
        }

        // حفظ البيانات
/*
if ($user->save()) {
    Log::info('Profile updated successfully for user ID: ' . $user->id);
    return redirect()->route('profile')->with('success', 'تم تحديث البيانات بنجاح');
} else {
    Log::error('Error updating profile for user ID: ' . $user->id);
    return redirect()->route('profile')->with('error', 'حدث خطأ أثناء تحديث البيانات');
}
*/

    }
}
