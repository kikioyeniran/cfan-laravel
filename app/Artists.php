<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $table  = 'artists';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getArtists()
    {
        $artists = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->paginate(8);
        return $artists;
    }

    public function getDisArtists()
    {
        $artists = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->paginate(8);
        return $artists;
    }
}
