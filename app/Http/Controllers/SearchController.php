<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\Forum;
use App\Models\Survey;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->keyword;
        
        $dataCategories = Category::where('title', 'like', "%".$keyword."%")->get();
        $dataForums = Forum::where('title', 'like', "%".$keyword."%")->get();
        $dataDiscussions = Discussion::where('title', 'like', "%".$keyword."%")->get();
        $dataSurveys = Survey::where('title', 'like', "%".$keyword."%")->get();
        
        return view('search-page', compact('dataCategories', 'dataForums', 'dataDiscussions', 'dataSurveys'));
    }
}
