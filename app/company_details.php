<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company_details extends Model
{
    protected $table  = 'company_details';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
