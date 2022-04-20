<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\NotifStatus;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SurveyController extends Controller
{

    public function showAllSurvey() {
        $surveys = Survey::all();
        return view('survey.surveys', compact('surveys'));
    }

    public function showForm() {
        return view('survey.survey_form');
    }

    public function storeSurvey(Request $request) {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'link' => 'required',
            'delete_at' => 'required'
        ],
        [
            'title.required' => 'Please Fill Out This Field',
            'body.required'  => 'Please Fill Out This Field',
            'link.required'  => 'Please Fill Out This Field',
            'delete_at.required'  => 'Please Fill Out This Field'
        ]
    );
        $survey = new Survey();
        $survey->title = $request->title;
        $survey->body = $request->body;
        $survey->link = $request->link;
        $survey->delete_at = $request->delete_at;
        $survey->user_id = auth()->id();
        $survey->save();
        toastr()->success('Survey Submit successfully!');

        $total = DB::table('users')->count();

        $notif = new Notif();
        $notif->description = "Create new survey $request->title";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            $notifStatus = new NotifStatus();
            $notifStatus->user_id = $i;
            $notifStatus->notif_id = Notif::latest()->value('id');
            $notifStatus->save();
        }

        return redirect('/survey');
    }

    public function showSurvey($id) {
        $survey = Survey::find($id);
        return view('survey.survey', compact('survey'));
    }

    public function showSelfSurvey($id) {
        if (auth()->id() != $id) {
            echo "NOT FOUND";
        } else {
            $surveys = Survey::where('user_id', $id)->get();
            return view('survey.self_survey', compact('surveys'));
        }
    }

    /**
     * menampilkan form untuk mengedit survey
     */
    public function editSurveyForm($id) {
        $survey = Survey::find($id);
        return view('survey.survey_edit_form', compact('survey'));
    }

    /**
     * menyimpan data hasil edit
     */
    public function storeEditSurvey(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'link' => 'required',
            'delete_at' => 'required'
        ],
        [
            'title.required' => 'Please Fill Out This Field',
            'body.required'  => 'Please Fill Out This Field',
            'link.required'  => 'Please Fill Out This Field',
            'delete_at.required'  => 'Please Fill Out This Field'
        ]
    );
        $survey = Survey::find($id);
        $survey->title = $request->title;
        $survey->body = $request->body;
        $survey->delete_at = $request->delete_at;
        $survey->link = $request->link;
        $survey->update();

        $user_id = auth()->id();
        toastr()->success('Edit Survey successfully!');
        return redirect("/survey/self/$user_id");
    }

    /**
     * hapus data survey
     */
    public function deleteSurvey($id) {
        Survey::find($id)->delete();
        toastr()->success('Delete Survey successfully!');
        return back();
    }

        /**
     * hapus survey oleh admin
     */
    public function deleteSurveyByAdmin($id) {
        $survey = DB::table("surveys")->where("id", $id);
        $survey->delete();
        toastr()->success('Delete Survey successfully!');
        return back();
    }

}
