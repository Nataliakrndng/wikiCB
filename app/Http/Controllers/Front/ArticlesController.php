<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticlesController extends Controller
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

        return view('articles', [
            'latest_post' => Article::with('Category')->whereStatus(1)->latest()->take(4)->get(),
            'articles' => $articles,
            'categories' => Category::get()
        ]);
    }
}
