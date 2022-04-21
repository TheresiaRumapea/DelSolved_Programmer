<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ForumRequest;
use App\Models\Notif;
use App\Models\NotifStatus;
use App\Models\RequestCategory;
use App\Models\User;
use App\Notifications\NewRequestCategory;
use App\Notifications\NewRequestForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{

    /**
     * menampilkan halaman form menambahkan
     * request category baru
     */
    public function show_category_view() {
        return view('request.request_category');
    }

    /**
     * menyimpan data request category baru yang ditambahkan
     * di form ke dalam database
     */
    public function store_request_category(Request $request) {
        $request_category = new RequestCategory();
        $request_category->category_title = $request->request_category_name;
        $request_category->category_desc = $request->request_category_desc;
        $request_category->user_id = auth()->id();
        $request_category->save();

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "New request category $request->request_category_name";
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

        $latest_request_category = RequestCategory::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewRequestCategory($latest_request_category));
        }
        toastr()->success('Request Category successfully!');

        return redirect('/');
    }

    /**
     * menampilkan halaman form menambahkan
     * request forum baru
     */
    public function show_forum_view() {
        $categories = Category::all();
        return view('request.request_forum', compact("categories"));
    }

    /**
     * menyimpan data request forum baru yang ditambahkan
     * di form ke dalam database
     */
    public function store_request_forum(Request $request) {

        $request->validate(
            [
                'title'=>'required',
                'category_id' => 'required'
            ],
            [
                'title.required' => 'Please fill out this field',
                'category_id.required' => 'Please select item in the list'
            ]
        );

        $request_forum = new ForumRequest();
        $request_forum->forum_title = $request->request_forum_name;
        $request_forum->forum_desc = $request->request_forum_desc;
        $request_forum->category_id = $request->request_forum_cat;
        $request_forum->user_id = auth()->id();
        $request_forum->save();

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "New request forum $request->request_forum_name";
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

        $latest_request_forum = ForumRequest::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewRequestForum($latest_request_forum));
        }
        toastr()->success('Request Forum successfully!');
        return redirect('/');
    }

}
