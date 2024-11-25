<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // عرض قائمة الموظفين
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    // عرض صفحة إضافة موظف جديد
    public function create()
    {
        return view('admin.employees.create');
    }

    // تخزين موظف جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'manage_activities' => $request->has('manage_activities'),
            'approve_requests' => $request->has('approve_requests'),
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'تم إضافة الموظف بنجاح');
    }

    // حذف موظف
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'تم حذف الموظف بنجاح');
    }
}

