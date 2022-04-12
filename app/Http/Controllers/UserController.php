<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function update(Request $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profession = $request->profession;
        $user->skills = $request->skills;
        $user->bio = $request->bio;
        $user->education = $request->education;
        $user->update();
        toastr()->success('Profile Update successfully!');
        return back();
    }

}
