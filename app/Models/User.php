<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'name', 'email', 'password', 'age', 'education', 'experience', 'address', 'phone', 'role', 'gender', // إضافة الجنس
    ];

    // الحقول المخفية عند استرجاع البيانات
    protected $hidden = [
        'password', 'remember_token',
    ];
}
