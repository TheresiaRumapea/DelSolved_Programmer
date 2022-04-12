<?php

namespace App\Notifications;

use App\Models\ForumRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRequestForum extends Notification
{
    use Queueable;
    public $request_forum;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request_forum)
    {
        $this->request_forum = $request_forum;
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
        $user = User::find($this->request_forum->user_id);
        $request_new_forum = ForumRequest::find($this->request_forum->id);
        return [
            'name' => $user->name,
            'email' => $user->email,
            'message' => $user->name . " request forum " . $request_new_forum->forum_title,
            'type' => 6
        ];
    }
}
