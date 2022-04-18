<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\NotifStatus;

class NotifController extends Controller
{
    public function index()
    {
        $notifs = Notif::orderBy('id', 'DESC')->get();
        return view('notification', compact('notifs'));
    }

    public function read($id) {
        $read = NotifStatus::find($id);
        $read->is_read = true;
        $read->update();
        return back();
    }

    public function delete($id) {
        $delete = NotifStatus::find($id);
        $delete->is_delete = true;
        $delete->update();
        return back();
    }
}
