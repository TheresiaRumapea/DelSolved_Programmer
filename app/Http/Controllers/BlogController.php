<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class BlogController extends Controller
{

    public function home()
    {
        $categories = Category::latest()->get();
        return view('client.blog.home', \compact('categories'));
    }

}
