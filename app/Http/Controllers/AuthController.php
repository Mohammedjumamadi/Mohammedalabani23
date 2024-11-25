<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     // دالة التسجيل
     public function register(Request $request)
     {
         // تحقق من صحة البيانات المدخلة مع رسائل مخصصة
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:6|confirmed', // التأكد من تطابق كلمة المرور
             'age' => 'required|integer|min:18', // العمر يجب أن يكون عددًا صحيحًا ومن 18 فما فوق
             'education' => 'required|string|max:255', // التعليم يجب أن يكون نصًا مع حد أقصى
             'experience' => 'required|string|max:255', // الخبرة يجب أن تكون نصًا مع حد أقصى
             'address' => 'required|string|max:255', // العنوان يجب أن يكون نصًا مع حد أقصى
             'phone' => 'required|numeric|digits_between:10,15', // رقم الهاتف
             'gender' => 'required|in:male,female', // التأكد من أن الجنس ممرر ومناسب
             'national_id' => 'required|numeric|digits:12|unique:users,national_id', // الرقم الوطني
             'volunteer_type' => 'required|in:technical,physical,psychological,social,administrative,media,medical,educational', // نوع التطوع
         ]);

         // تخزين البيانات في قاعدة البيانات بعد التحقق من صحتها
         User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'age' => $request->age,
             'education' => $request->education,
             'experience' => $request->experience,
             'address' => $request->address,
             'phone' => $request->phone,
             'role' => 'user',
             'gender' => $request->gender,
             'national_id' => $request->national_id, // الرقم الوطني
             'volunteer_type' => $request->volunteer_type, // نوع التطوع
         ]);

         // إعادة التوجيه أو إرسال استجابة بعد التسجيل
         return redirect()->route('login')->with('success', 'تم التسجيل بنجاح');
     }



    // دالة تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        // التحقق إذا كانت بيانات المدير
        if ($credentials['email'] == '12312431a0@emailfoxi.pro' && $credentials['password'] == '12345678') {
            // تحقق من معرف المستخدم (المدير) إذا كان id 9
            $user = User::where('email', $credentials['email'])->first();

            if ($user && $user->id == 4) {
                // تسجيل الدخول كمدير النظام باستخدام معرفه
                Auth::loginUsingId(4); // هنا يتم استخدام معرف المدير مباشرة
                return redirect()->route('admin'); // توجيه مدير النظام إلى صفحة الإدارة
            } else {
                return back()->withErrors([ // إذا كان ليس المدير
                    'email' => 'لا تمتلك صلاحيات الدخول كمدير النظام.',
                ]);
            }
        }

        // التحقق من متطوعين آخرين باستخدام طريقة المصادقة المعتادة
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // توجيههم إلى صفحة الأنشطة
            return redirect()->route('activities');
        }

        // في حال كانت البيانات المدخلة غير صحيحة
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ]);
    }

    // دالة الخروج
    public function logout()
    {
        Auth::logout(); // تسجيل الخروج
        return redirect()->route('home'); // إعادة التوجيه إلى الصفحة الرئيسية
    }


     // دالة لعرض نموذج التسجيل
     public function showRegistrationForm()
     {
         return view('register'); // تأكد من أن لديك هذا العرض
     }

}
