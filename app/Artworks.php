<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\art_category;

class Artworks extends Model
{
    protected $table  = 'artworks';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getArtWorksByLink($link)
    {
        $category = art_category::where('link', $link)->get();
        foreach ($category as $cat) {
            $cat_id = $cat->id;
            $cat_name = $cat->name;
        }
        $artworks = DB::table('artworks')
            ->select(
                'artworks.id AS aid',
                'artworks.category_id',
                'artworks.artist_id',
                'artworks.description',
                'artworks.picture',
                'artworks.archived',
                'artworks.measurement',
                'art_categories.id',
                'art_categories.name AS category',
                'art_categories.disabled',
                'artists.id',
                'artists.name AS artist',
                'artists.disabled'
            )
            ->join('art_categories', 'art_Categories.id', '=', 'artworks.category_id')
            ->join('artists', 'artists.id', '=', 'artworks.artist_id')
            ->where('artworks.archived', '=', 'false')
            ->where('artworks.category_id', '=', $cat_id)
            ->where('art_categories.disabled', '=', 'false')
            ->where('artists.disabled', '=', 'false')
            ->paginate(8);
        return [$artworks, $cat_name];
    }

    public function getArchivedArtworks()
    {
        $artworks = DB::table('artworks')
            ->select(
                'artworks.id AS aid',
                'artworks.category_id',
                'artworks.artist_id',
                'artworks.description',
                'artworks.picture',
                'artworks.archived',
                'artworks.measurement',
                'art_categories.id',
                'art_categories.name AS category',
                'art_categories.disabled',
                'artists.id',
                'artists.name AS artist',
                'artists.disabled'
            )
            ->join('art_categories', 'art_Categories.id', '=', 'artworks.category_id')
            ->join('artists', 'artists.id', '=', 'artworks.artist_id')
            ->where('artworks.archived', '=', 'true')
            ->paginate(8);
        return $artworks;
    }
}
