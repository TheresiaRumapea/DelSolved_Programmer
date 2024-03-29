<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\User;
use App\Models\DiscussionReply;
use App\Notifications\NewTopic;
use App\Notifications\NewReply;

class DiscussionController extends Controller
{

    public function create($id)
    {
        $forum = Forum::find($id);
        return view('client.new-topic', compact('forum'));
    }

    public function store(Request $request, $id)
    {
        $request->validate(
            [
            'title' => 'required'
            // 'desc' => 'required'
            ],
            [
                'title.required' => 'Please Fill Out This Field'
                // 'desc.required'  => 'Inputan Deskripsi tidak boleh kosong',
            ]
        );

        $notify = 0;

        if ($request->notify && $request->notify == "on") {
            $notify = 1;
        }

        $topic = new Discussion;
        $topic->title = $request->title;
        $topic->desc = $request->desc;
        $topic->forum_id = $id;
        $topic->user_id = auth()->id();
        $topic->notify = $notify;

        $topic->save();

        $user = auth()->user();
        $user->increment('rank', 10);

        $latestTopic = Discussion::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewTopic($latestTopic));
        }

        toastr()->success('Discussion Started successfully!');
        return redirect('/');
    }

    public function show($id)
    {
        $topic = Discussion::find($id);
        if ($topic) {
            $topic->increment('views', 1);
        }
        return view('client.topic', \compact('topic'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate(
            [
                'desc' => 'required'
            ],
            [
                'desc.required'  => 'Inputan Deskripsi tidak boleh kosong',
            ]
        );

        $reply = new DiscussionReply;
        $reply->desc = $request->desc;
        $reply->user_id = auth()->id();
        $reply->discussion_id = $id;
        $discussion = Discussion::find($id);
        $forumId = $discussion->forum->id;
        $url = \URL::to('/forum/overview/'. $forumId);

        $reply->save();

        $user = auth()->user();
        $user->increment('rank', 10);

        $latestReply = DiscussionReply::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewReply($latestReply));
        }
            $latestReply = DiscussionReply::latest()->first();
            $admins = User::where('is_admin', 0)->get();
            foreach ($admins as $admin) {
                $admin->notify(new NewReply($latestReply));
    }

        toastr()->success('Reply saved successfully!');
        return back();
    }

    public function destroy($id)
    {
        $reply = DiscussionReply::find($id);
        $reply->delete();
        toastr()->success('Delete Reply successfully!');
        return back();
    }

    public function remove($id)
    {
        $discussion = Discussion::find($id);
        $discussion->delete();
        toastr()->success('Delete Topic successfully!');
        return back();
    }

    public function sort(Request $request)
    {
        if ($request->time_posted == "none" || $request->author == "none" || $request->direction == "none") {
            toastr()->error('Please sect at least one sorting criteria!');
            return back();
        }
        $topics = null;
        switch ($topics) {
            case $request->time_posted == "latest":
                $topics = Discussion::latest()->paginate(20);
                break;
            case $request->time_posted == "oldest":
                $topics = Discussion::oldest()->paginate(20);
                break;
            default:
                toastr()->error('No topics Found!');
                break;
        }
        return back()->withTopics($topics);
    }

}
