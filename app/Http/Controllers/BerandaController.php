<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $news = News::latest()->take(3)->get();
        return view('beranda', compact('news'));
    }

    public function news_index()
    {
        $news = News::latest()->get();
        return view('news-index', compact('news'));
    }

    public function news($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('news', compact('news'));
    }
}
