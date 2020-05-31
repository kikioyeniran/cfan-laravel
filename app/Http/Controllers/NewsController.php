<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Controllers\actions\UtilitiesController;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'displayByLink']]);
    }
    public function index()
    {
        $new = new News();
        $news = $new->getNews();
        return view('news.index')->with('news', $news);
    }

    public function all()
    {
        $new = new News();
        $news = $new->getNews();
        return view('news.all')->with('news', $news);
    }

    public function displayByLink($link)
    {
        $new = new News();
        $news = $new->getNewsByLink($link);
        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'news_img' => 'image|nullable|max:2999'
        ]);
        //Handle file up0loads
        $image = $request->file('news_img');
        if ($request->hasFile('news_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $news = new News;
        $news->title = $title;
        $news->author = $request->input('author');
        $news->summary = $request->input('summary');
        $news->details = $request->input('details');
        $news->picture = $fileNameToStore;
        $news->link = $link;
        $news->save();
        return redirect('/news/all')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit')->with('post', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'news_img' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('news_img');
        //Handle file up0loads
        if ($request->hasFile('news_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $news = News::find($id);
        $news->title = $title;
        $news->author = $request->input('author');
        $news->summary = $request->input('summary');
        $news->details = $request->input('details');
        $news->link = $link;
        if ($request->hasFile('news_img')) {
            $news->picture = $fileNameToStore;
        }
        $news->save();
        return redirect('/news/all')->with('success', 'Post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Archive news
    public function archive($id)
    {
        $news = News::find($id);
        $news->archived = 'true';
        $news->save();
        return redirect('/news/all')->with('success', 'Post archived');
    }

    // Restore archived news
    public function restore($id)
    {
        $news = News::find($id);
        $news->archived = 'false';
        $news->save();
        return redirect('/news/archived')->with('success', 'Post Restored');
    }

    // Display archived news
    public function archived()
    {
        $new = new news();
        $d_news = $new->getArchivednews();
        return view('news.archived')->with('news', $d_news);
    }
}
