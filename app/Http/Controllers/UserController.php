<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // عرض صفحة الملف الشخصي
    public function showProfile()
    {
        $user = Auth::user(); // جلب بيانات المستخدم المسجل حالياً
        return view('profile', compact('user'));

    }

    // تحديث بيانات الملف الشخصي
public function updateProfile(Request $request)
{
    $user = Auth::user();

    // تحديث البيانات بناءً على المدخلات
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->age = $request->input('age');
    $user->education = $request->input('education');
    $user->experience = $request->input('experience');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->gender = $request->input('gender'); // إضافة تحديث الحقل الجنس
    $user->save();

    return redirect()->route('profile')->with('success', 'تم تحديث البيانات بنجاح');
}



}

