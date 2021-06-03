<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    //==========ここから追加==========
    public function index()
    {
        //==========ここから追加==========
        $articles = Article::all()->sortByDesc('created_at');
        //==========ここまで追加==========

        return view('articles.index', ['articles' => $articles]);
    }
}
