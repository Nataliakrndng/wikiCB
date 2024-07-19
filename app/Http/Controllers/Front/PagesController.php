<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($slug){
        return view('pages',[
            'article' => Article::with('Category')->whereSlug($slug)->firstOrFail(),
            'categories' => Category::all()
        ]);
    }
}
