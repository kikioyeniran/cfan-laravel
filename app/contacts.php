<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table  = 'contacts';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getContacts()
    {
        $contacts = $this::orderBy('created_at', 'desc')->get();
        return $contacts;
    }
}
