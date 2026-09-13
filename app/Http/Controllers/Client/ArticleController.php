<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Entities\Admin\Client;
use App\Entities\Admin\Article;
use App\Entities\Admin\Consultant;
use App\Entities\Admin\Classification;
use App\Http\Controllers\Controller;
class ArticleController extends Controller
{
    // public function index()
    // {
    //     $articles =Article::with('consultant','classification')->latest()->get();
    //     return view('client.articles.index',compact('articles'));
    // }

    public function index(Request $request)
    {
        $consultants = Consultant::all();
        $classifications = Classification::all();

        $latest =Article::latest()->take(6)->get();

        $articles = Article::latest()->with('consultant', 'classification');    
        if ($request->has('consultant_id') && $request->consultant_id != '') {
            $articles = $articles->where('consultant_id', $request->consultant_id);
        }
        if ($request->has('classification_id') && $request->classification_id != '') {
            $articles = $articles->where('classification_id', $request->classification_id);
        }
        $articles = $articles->paginate(6);
        return view('client.articles.index', compact('articles', 'consultants', 'classifications','latest'));
    }

    public function show( $slug)
    {
        $posts =Article::latest()->take(6)->get();
        $article =Article::where('slug_ar',$slug)->first();
        if($article==null) 
        abort(404);
        $consultants = Consultant::all();
        $classifications = Classification::all();

        return view('client.articles.show', compact('article','posts','consultants','classifications'));
    }
        
}
