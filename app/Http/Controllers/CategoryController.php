<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\NotifStatus;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewCategory;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\User;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(20);

        return view('admin.pages.categories', \compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.new_category');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
            ],
            [
                'title.required' => 'Please fill out this field',
            ]
        );

        $category = new Category;
        $category->title = $request->title;
        $category->desc = $request->desc;
        $category->user_id = auth()->id();
        $category->save();

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Create new category $request->title";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            $notifStatus = new NotifStatus();
            $notifStatus->user_id = $i;
            $notifStatus->notif_id = Notif::latest()->value('id');
            $notifStatus->save();
        }

        $latestCategory = Category::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewCategory($latestCategory));
        }
        toastr()->success('Category Added successfully!');
        return redirect('/dashboard/categories');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.pages.single_category', \compact("category"));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.edit_category', \compact('category'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'title'=>'required',
            ],
            [
                'title.required' => 'Please fill out this field',
            ]
        );

        $category = Category::find($id);
        if ($request->title) {
            $category->title = $request->title;
        }

        if ($request->desc) {
            $category->desc = $request->desc;
        }

        $category->save();
        // Session::flash('message', 'Category Updated Successfully');
        // Session::flash('alert-class', 'alert-success');
        toastr()->success('Edit Category successfully!');
        return redirect('/dashboard/categories');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->success('Delete Category successfully!');
        return back();
    }

}
