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

class AcceptCategory extends Notification
{
    use Queueable;
    public $category;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($category)
    {
        //
        $this->category = $category;
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
        $user = User::find($this->category->user_id);
        return [
            'name' =>$user->name,
            'email'=>$user->email,
            'message'=> $user->name." Accept the ".$this->category->title." Category",
            'type'=>7
        ];
    }
}
