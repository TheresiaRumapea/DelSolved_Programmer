<?php

namespace App\Http\Controllers;

use App\Models\ForumRequest;
use App\Models\Notif;
use App\Models\NotifStatus;
use App\Models\RequestCategory;
use App\Models\User;
use App\Models\Forum;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Discussion;
use App\Notifications\NewCategory;
use App\Notifications\AcceptCategory;
use App\Notifications\RejectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\AcceptForum;
use App\Notifications\RejectForum;

class DashboardController extends Controller
{

    public function home()
    {
        $categories = Category::latest()->paginate(15);
        $topics = Discussion::latest()->paginate(15);
        $forums = Forum::latest()->paginate(15);
        $users = User::latest()->paginate(15);
        return view('admin.pages.home', compact('categories', 'topics', 'forums', 'users'));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.pages.users', compact('users'));
    }

    public function show($id)
    {
        $latest_user_post = Discussion::where('user_id', $id)->latest()->first();
        $latest = Discussion::latest()->first();
        $user = User::find($id);
        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }

    public function profile()
    {
        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        $user = auth()->user();
        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfully!');
        return back();
    }

    public function notifications()
    {
//        $notifications = auth()->user()->notifications()->where('read_at', null)->get();
        $notifs = Notif::orderBy('id', 'DESC')->get();
        return view('admin.pages.notifications', compact('notifs'));
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

    public function settingsForm()
    {
        return view('admin.pages.setting');
    }

    public function newSetting(Request $request)
    {
        $set = new Setting;
        $set->forum_name =$request->forum_name;
        $set->save();
        toastr()->success('Settings saved successfully!');
        return back();
    }

    public function request() {
        $request_categories = RequestCategory::latest()->get();
        $request_forums = ForumRequest::latest()->get();
        return view('admin.pages.request', compact('request_categories', 'request_forums'));
    }

    public function accept_category($id) {
        $request_category = RequestCategory::find($id);
        $category = new Category();
        $category->title = $request_category->category_title;
        $category->desc = $request_category->category_desc;
        $category->user_id = auth()->id();
        $category->save();

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Request Category $request_category->category_title accept";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            if ($i === auth()->id()) {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->is_read = 1;
                $notifStatus->is_delete = 1;
                $notifStatus->save();
            } else {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->save();
            }
        }

        $latestCategory = Category::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewCategory($latestCategory));
        }
            $latestCategory = Category::latest()->first();
            $users = User::where('is_admin', 0)->get();
            foreach ($users as $user) {
                $user->notify(new AcceptCategory($latestCategory));
        }

        $request_category->delete();
        return redirect('dashboard/categories');
    }

    public function reject_category($id) {
        $titleObj = RequestCategory::find($id);

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Request Category $titleObj->forum_title reject";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            if ($i === auth()->id()) {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->is_read = 1;
                $notifStatus->is_delete = 1;
                $notifStatus->save();
            } else {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->save();
            }

        }

        RequestCategory::find($id)->delete();


        $latestCategory = Category::latest()->first();
        $users = User::where('is_admin', 0)->get();
        foreach ($users as $user) {
            $user->notify(new RejectCategory($latestCategory));
    }

        return back();

    }

    public function accept_forum($id) {
        $request_forum = ForumRequest::find($id);
        $forum = new Forum();
        $forum->title = $request_forum->forum_title;
        $forum->desc = $request_forum->forum_desc;
        $forum->user_id = auth()->id();
        $forum->category_id = $request_forum->category_id;

        $latestForum = Forum::latest()->first();
        $users = User::where('is_admin', 0)->get();
        foreach ($users as $user) {
            $user->notify(new AcceptForum($latestForum));
        }

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Request Forum $request_forum->request_title accept";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            if ($i === auth()->id()) {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->is_read = 1;
                $notifStatus->is_delete = 1;
                $notifStatus->save();
            } else {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->save();
            }
        }

        $forum->save();
        $request_forum->delete();
        return back();


    }

    public function reject_forum($id) {
        $titleObj = ForumRequest::find($id);

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Request Forum $titleObj->forum_title reject";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            if ($i === auth()->id()) {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->is_read = 1;
                $notifStatus->is_delete = 1;
                $notifStatus->save();
            } else {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->save();
            }

        }

        ForumRequest::find($id)->delete();
        $latestForum = Forum::latest()->first();
        $users = User::where('is_admin', 0)->get();

        foreach ($users as $user) {
            $user->notify(new RejectForum($latestForum));
        }
        return back();


    }

}
