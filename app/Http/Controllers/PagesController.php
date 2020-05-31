<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artists;
use App\News;

class PagesController extends Controller
{
    public function about()
    {
        $new = new Artists();
        $artists = $new->getArtists();
        return view('about')->with('artists', $artists);
    }
    public function services()
    {
        return view('services');
    }
    public function index()
    {
        $new = new News();
        $news = $new->getNewsForIndex();
        return view('index')->with('news', $news);
    }
}
