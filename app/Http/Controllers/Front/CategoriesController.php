<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Article;


class CategoriesController extends Controller
{

    public function index($slugCategory)
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::whereHas('Category', function($q) use ($slugCategory){
                $q->where('slug', $slugCategory);
            })
                    ->whereStatus(1)
                    ->where('title', 'like', '%' .$keyword. '%')
                    ->latest()
                    ->simplePaginate(5);
        } else {
            $articles = Article::whereHas('Category', function($q) use ($slugCategory){
                $q->where('slug', $slugCategory);
            })->whereStatus(1)->latest()->simplePaginate(5);
        }


        return view('categories', [
            'category' => Category::where('slug', $slugCategory)->firstOrFail(),
            'articles' => $articles,
            'latest_post' => Article::with('Category')->whereStatus(1)->latest()->take(4)->get(),
            'categories' => Category::all()
        ]);
    }
}
