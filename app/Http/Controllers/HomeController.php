<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $discussions = Discussion::where('user_id', auth()->id())->get();
        return view('home', compact('latest_user_post', 'discussions'));
    }

    /**
     * menampilkan form edit discussion
     */
    public function showEditForm($id) {
        $user = Discussion::where('id', $id)->value('user_id');
        if (auth()->id() == $user) {
            $forum_id = Discussion::where('id', $id)->value('forum_id');
            $forums = Forum::all();
            $forum = Forum::find($forum_id);
            $discussion = Discussion::find($id);
            return view('profil-discussion.edit-discussion', compact('forum', 'forums', 'discussion'));
        } else {
            echo "NOT FOUND";
        }

    }

    /**
     * simpan hasil edit discussion
     */
    public function storeEdit(Request $request, $id)
    {
        $discussion = Discussion::find($id);
        $discussion->title = $request->title;
        $discussion->desc = $request->desc;
        $discussion->user_id = auth()->id();
        $discussion->update();
        toastr()->success('Edit Topic successfully!');
        return redirect('/home');
    }

    /**
     * delete self discussion
     */
    public function deleteDiscussion($id)
    {
        Discussion::find($id)->delete();
        toastr()->success('Delete Topic successfully!');
        return back();
    }

// Notification User
public function notifications()
{
    $notifications = auth()->user()->notifications()->where('read_at', null)->get();
    return view('client.UserNotification', compact('notifications'));
}

public function markAsRead($id)
{
    DB::table('notifications')->where('id', $id)->update(['is_read' => 1]);
    return back();
}

public function notificationDestroy($id)
{
    $notification = auth()->user()->notifications()->where('id', $id)->first();
    $notification->delete();
    toastr()->success('Notification deleted successfully!');
    return back();
}


}
