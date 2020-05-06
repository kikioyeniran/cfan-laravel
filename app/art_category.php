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
}
