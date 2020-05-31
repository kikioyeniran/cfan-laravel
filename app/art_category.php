<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class art_category extends Model
{
    protected $table  = 'art_categories';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCategories()
    {
        $categories = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->get();
        return $categories;
    }
    public function getDisCategories()
    {
        $categories = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->get();
        return $categories;
    }
    public function getLink($cid)
    {
        $category = $this::find($cid);
        $link = $category->link;
        return $link;
    }
}
