<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        // الحصول على المستخدم الحالي
        $user = Auth::user();

        // التحقق من دور المستخدم وإرجاع الصفحة المناسبة
        if ($user->role == 'volunteer') {
            return view('dashboard.volunteer'); // صفحة المتطوع
        } elseif ($user->role == 'admin') {
            return view('dashboard.admin'); // صفحة المدير
        } elseif ($user->role == 'employee') {
            return view('dashboard.employee'); // صفحة الموظف
        }

        // إذا لم يكن للمستخدم دور صالح
        return abort(403); // عرض خطأ إذا لم يكن هناك دور مطابق
    }
}

