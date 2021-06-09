<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    //ポリシーを使用
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    //一覧表示
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    //登録画面表示
    public function create()
    {
        return view('articles.create');
    }

    //登録処理
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    //更新画面 
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }
    //更新処理
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        return redirect()->route('articles.index');
    }
    //削除処理
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    //追加 ログイン状態でなくても表示
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
