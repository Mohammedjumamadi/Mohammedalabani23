<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    /**
     * عرض نموذج طلب استعادة كلمة المرور.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('passwords.email'); // تأكد من أن اسم الواجهة هو الصحيح.
    }

    /**
     * إرسال رابط استعادة كلمة المرور.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // التحقق من صحة البريد الإلكتروني
        $request->validate([
            'email' => 'required|email|exists:users,email', // تأكد من أن البريد موجود في جدول المستخدمين
        ]);

        // إرسال رابط استعادة كلمة المرور
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // التحقق من نتيجة إرسال الرابط
        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response)) // إظهار رسالة النجاح
            : back()->withErrors(['email' => trans($response)]); // إظهار رسالة الخطأ في حالة الفشل
    }
}

