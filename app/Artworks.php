<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
