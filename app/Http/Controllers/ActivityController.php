<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Notifications\NewActivityNotification;
use Illuminate\Support\Facades\Log;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'volunteers_needed' => 'required|integer',
            'duration_hours' => 'required|integer|min:0', // تحقق من الساعات (يجب أن تكون عدد صحيح)
            'duration_minutes' => 'required|integer|min:0|max:59', // تحقق من الدقائق (يجب أن تكون عدد صحيح من 0 إلى 59)
        ]);

        // إنشاء النشاط
        $activity = Activity::create($request->all());

        // استخرج المتطوعين
        $volunteers = User::where('role', 'user')->get();

        // التحقق من وجود متطوعين قبل إرسال الإشعار
        if ($volunteers->isEmpty()) {
            return redirect()->route('admin.activities.index')->with('error', 'لا يوجد متطوعين لإرسال إشعار لهم.');
        }

        // إرسال الإشعار إلى جميع المتطوعين بشكل غير متزامن
        foreach ($volunteers as $volunteer) {
            try {
                $volunteer->notify(new NewActivityNotification($activity));
            } catch (\Exception $e) {
                Log::error("خطأ في إرسال الإشعار للمتطوع {$volunteer->id}: " . $e->getMessage());
            }
        }

        return redirect()->route('admin.activities.index')->with('success', 'تم إضافة النشاط بنجاح');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'تم حذف النشاط بنجاح');
    }

    public function manage()
    {
        $activities = Activity::paginate(10);
        return view('admin.activities.manage', compact('activities'));
    }

    public function availableActivities()
    {
        $activities = Activity::all();
        return view('available_activities', compact('activities'));
    }

    public function edit($id)
{
    $activity = Activity::findOrFail($id);
    return view('admin.activities.edit', compact('activity'));
}

public function update(Request $request, $id)
{
    $activity = Activity::findOrFail($id);
    $activity->update($request->all());
    return redirect()->route('admin.activities.index')->with('success', 'تم تحديث النشاط بنجاح');
}
}
