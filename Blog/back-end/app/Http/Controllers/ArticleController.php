<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class articleController extends Controller
{
    //latest 5 articles for articles section
    public function fetchArticles(Request $request)
    {
        $latestArticleIds = Article::select('id')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->pluck('id');

        $query = Article::with('author', 'images', 'tags')
            ->whereNotIn('id', $latestArticleIds)
            ->orderBy('created_at', 'desc');

        $articles = $query->paginate(5);
        return response()->json($articles);
    }

    //latest 3 articles for hero 
    public function latestArticles()
    {
        $latestArticles = Article::with(['tags', 'images', 'author'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return response()->json($latestArticles);
    }
    // Fetch the latest 3 featured articles
    public function latestFeaturedArticles()
    {
        $latestFeaturedArticles = Article::with(['images', 'author'])
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return response()->json($latestFeaturedArticles);
    }
}
