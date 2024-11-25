<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Activity;

class NewActivityNotification extends Notification
{
    use Queueable;

    public $activity;

    // تمرير النشاط للإشعار
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function via($notifiable)
    {
        return ['database', 'mail']; // يمكنك استخدام البريد الإلكتروني أو قاعدة البيانات
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->activity->name,
            'description' => $this->activity->description,
            'date' => $this->activity->date,
            'city' => $this->activity->city,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('هناك نشاط جديد يمكنك المشاركة فيه.')
                    ->action('تفاصيل النشاط', url('/activities/'.$this->activity->id))
                    ->line('يرجى الاطلاع على التفاصيل.');
    }
}
