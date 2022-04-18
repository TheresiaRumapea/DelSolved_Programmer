<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\NotifStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Forum;

class ForumController extends Controller
{

    public function index()
    {
        $forums = Forum::latest()->paginate(10);
        return view('admin.pages.forums', \compact('forums'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.pages.new_forum', \compact('categories'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'title'=>'required',
            ],
            [
                'title.required' => 'Please Fill Out This Field',
            ]
        );
        Forum::create($request->all());
        // Session::flash('message', 'Forum  Created Successfully');
        // Session::flash('alert-class', 'alert-success');

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Create new forum $request->title";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            $notifStatus = new NotifStatus();
            $notifStatus->user_id = $i;
            $notifStatus->notif_id = Notif::latest()->value('id');
            $notifStatus->save();
        }

        toastr()->success('Forum Added successfully!');
        return redirect('/dashboard/forums');
    }

    public function edit($id)
    {
        $forum = Forum::find($id);
        $categories = Category::latest()->get();

        return view('admin.pages.edit_forum', \compact('forum', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ],
        [
            'title.required' => 'Please Fill Out This Field',
        ]
    );

        $forum = Forum::find($id);
        $forum->update($request->all());
        // Session::flash('message', 'Forum  Updated Successfully');
        // Session::flash('alert-class', 'alert-success');
        toastr()->success('Edit Forum successfully!');
        return redirect('/dashboard/forums');
    }

    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();
        toastr()->success('Delete Forum successfully!');
        return back();
    }
}
