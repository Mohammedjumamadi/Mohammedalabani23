<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التحقق إذا كان المستخدم هو مدير النظام
        if (Auth::check() && Auth::user()->email == '12312431a0@emailfoxi.pro') {
            return $next($request);
        }

        // إذا لم يكن المستخدم مدير النظام، يتم إعادة التوجيه إلى صفحة أخرى أو عرض رسالة خطأ
        return redirect()->route('home')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة.');
    }
}
