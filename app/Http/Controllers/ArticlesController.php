<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    //
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    } 

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    } 
    
    public function create()
    {
       return view('articles.create');
    }

    public function store()
    {


      Article::create($this->validateArticle());

       return redirect(route('articles.index'));
    } 

    public function edit(Article $article)
    {
        // find the article associated with the id
       return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
       $article->update($this->validateArticle());

 
        return redirect($article->path());

    }

    public function validateArticle()
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
