<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function __invoke(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
