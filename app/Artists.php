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
}
