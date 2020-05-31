<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Gallery;

class Event extends Model
{
    protected $table  = 'events';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getEvents()
    {
        $events = $this::orderBy('created_at', 'desc')->where('archived', 'false')->paginate(8);
        return $events;
    }
    public function getArchivedEvents()
    {
        $events = $this::orderBy('created_at', 'desc')->where('archived', 'true')->paginate(8);
        return $events;
    }
    public function getLink($cid)
    {
        $event = $this::find($cid);
        $link = $event->link;
        return $link;
    }
    public function getEventByLink($link)
    {
        $event = $this::where('link', $link)->get();
        foreach ($event as $ev) {
            $ev_id = $ev->id;
        }

        $gallery = Gallery::where('event_id', 4)->get();
        // var_dump($gallery);
        return [$event, $gallery];
    }
}
