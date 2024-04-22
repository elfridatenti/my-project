<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'is_published' => 'required|boolean',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/news', $image->hashName());

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->hashName(),
            'slug' => \Str::slug($request->title),
            'is_published' => $request->is_published,
            'published_at' => $request->is_published ? now() : null,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image',
            'is_published' => 'required|boolean',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'is_published' => $request->is_published,
            'published_at' => $request->is_published ? now() : null,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/news', $image->hashName());
            $data['image'] = $image->hashName();
        }

        $news->update($data);

        return redirect()->route('dashboard.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('dashboard.news.index');
    }
}
