<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewCategory;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\User;

class RejectForum extends Notification
{
    use Queueable;
    public $forum;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($forum)
    {
        //
        $this->forum = $forum;


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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->forum->user_id);
        return [
            'name' =>$user->name,
            'email'=>$user->email,
            'message'=> $user->name." Reject the ".$this->forum->title." Forum",
            'type'=>4
        ];
    }
}
