<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table  = 'news';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getNews()
    {
        $news = $this::orderBy('created_at', 'desc')->where('archived', 'false')->paginate(8);
        return $news;
    }
    public function getNewsByLink($link)
    {
        $news = $this::where('link', $link)->where('archived', 'false')->get();
        return $news;
    }
    public function getArchivedNews()
    {
        $news = $this::orderBy('created_at', 'desc')->where('archived', 'true')->paginate(8);
        return $news;
    }
    public function getNewsForIndex()
    {
        $news = $this::orderBy('created_at', 'desc')->where('archived', 'false')->get()->take(4);
        return $news;
    }
}
