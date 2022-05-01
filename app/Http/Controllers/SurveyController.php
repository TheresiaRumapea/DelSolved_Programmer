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
            'link' => 'required|url',
            'delete_at' => 'required|date|after:now'
        ],
        [
            'title.required' => 'Please fill out this field',
            'body.required'  => 'Please fill out this field',
            'link.required'  => 'Please fill out this field',
            'link.url'  => 'Please enter a correct link.',
            'delete_at.required'  => 'Please fill out this field'
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
        $notif->description = "New survey $request->title created";
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
            'link' => 'required|url',
            'delete_at' => 'required|date|after:now'
        ],
        [
            'title.required' => 'Please fill out this field',
            'body.required'  => 'Please fill out this field',
            'link.required'  => 'Please fill out this field',
            'link.url'  => 'Please enter a correct link.',
            'delete_at.required'  => 'Please fill out this field'
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
        $temp_survey = Survey::find($id);
        $temp_survey->delete();
        toastr()->success('Delete Survey successfully!');
        return back();
    }

        /**
     * hapus survey oleh admin
     */
    public function deleteSurveyByAdmin($id) {
        $temp_survey = Survey::find($id);

        $survey_title = $temp_survey->title;
        $survey_person_id = $temp_survey->user_id;

        $total = DB::table('users')->count();
        $notif = new Notif();
        $notif->description = "Your survey ($survey_title) deleted by admin";
        $notif->user_id = auth()->id();
        $notif->save();

        for ($i = 1; $i <= $total; $i++) {
            if ($i === $survey_person_id) {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->save();
            } else {
                $notifStatus = new NotifStatus();
                $notifStatus->user_id = $i;
                $notifStatus->notif_id = Notif::latest()->value('id');
                $notifStatus->is_read = 1;
                $notifStatus->is_delete = 1;
                $notifStatus->save();
            }
        }

        $temp_survey->delete();
        toastr()->success('Delete Survey successfully!');
        return back();
    }

}
