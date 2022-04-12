<?php

namespace App\Notifications;

use App\Models\RequestCategory;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRequestCategory extends Notification
{
    use Queueable;
    public $request_category;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request_category)
    {
        $this->request_category = $request_category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->request_category->user_id);
        $request_new_category = RequestCategory::find($this->request_category->id);
        return [
            'name' => $user->name,
            'email' => $user->email,
            'message' => $user->name . " request category " . $request_new_category->category_title,
            'type' => 5
        ];
    }
}
