<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::with('Category')
                    ->whereStatus(1)
                    ->where('title', 'like', '%' .$keyword. '%')
                    ->simplePaginate(5);
        } else {
            $articles = Article::with('Category')->whereStatus(1)->simplePaginate(5);
        }


        return view('welcome', [
            'articles' => $articles,
            'categories' => Category::get()

        ]);
    }
}
