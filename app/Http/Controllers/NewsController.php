<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * 当前页面的标题
     *
     * @var string
     */
    protected $title = '新闻';

    public function index()
    {
        $news = News::select('id', 'title')->paginate(20);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        News::create($request->all());

        return redirect()->route('news.index');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news, Request $request)
    {
        $news->update($request->all());

        return redirect()->route('news.show', [$news->id]);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index');
    }
}
