<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailing_list extends Model
{
    protected $table  = 'mailing_lists';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
