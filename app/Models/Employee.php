<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'manage_activities', 'approve_requests',
    ];

    protected $hidden = [
        'password',
    ];
}
