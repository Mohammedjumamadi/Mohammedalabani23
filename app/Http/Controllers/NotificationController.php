<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        // جلب الإشعارات الغير مقروءة
        $notifications = auth()->user()->unreadNotifications;

        // علامة جميع الإشعارات كمقروءة
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = DatabaseNotification::find($id);

        if ($notification && $notification->notifiable_id == auth()->id()) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}

