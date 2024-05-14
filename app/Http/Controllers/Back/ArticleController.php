<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $article = Article::with('Category')->get();

            return DataTables::of($article)

            ->addIndexColumn()
            ->addColumn('category_id', function($article){
                return $article->Category->name;
            })
            ->addColumn('status', function($article) {
                if ($article->status == 0) {
                    return '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Unpublished</span>';
                } else {
                    return '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>';
                }
            })

            ->addColumn('action', function($article) {
                return '<div>
                    <td class="flex items-center px-6 py-3">
                        <a href="article/'.$article->id.'" class="font-medium text-indigo-500 dark:text-indigo-500 hover:underline">Detail</a>
                        <a href="article/'.$article->id.'/edit" class="font-medium text-green-700 dark:text-green-700 hover:underline ms-3">Edit</a>
                        <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                    </td>
                </div>';
            })

            ->rawColumns(['category_id','status','action'])
            ->make();
        }

        return view('back.article.index');

    }

    public function create()
    {
        return view('back.article.create',[
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/back/', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article')) -> with('success', 'Data Article Has Been Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show',[
            'article' => Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update',[
            'article' => Article::find($id),
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);

            Storage::delete('public/back'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect(url('article')) -> with('success', 'Data Article Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);

        Storage::delete('public/back'.$data->img);

        $data->delete();

        return response()->json([
            'message' => 'Data has been deleted.'
        ]);

    }
}
