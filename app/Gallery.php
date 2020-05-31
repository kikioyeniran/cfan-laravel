<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Event;

class Gallery extends Model
{
    protected $table  = 'galleries';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getImageByLink($link)
    {
        $event = Event::where('link', $link)->get();
        foreach ($event as $ev) {
            $ev_id = $ev->id;
            $ev_theme = $ev->theme;
        }
        $gallery = DB::table('galleries')
            ->select(
                'galleries.id AS gid',
                'galleries.event_id',
                'galleries.description',
                'galleries.picture',
                'events.id',
                'events.theme',
                'events.archived',
                'events.link'
            )
            ->join('events', 'events.id', '=', 'galleries.event_id')
            ->where('galleries.event_id', '=', $ev_id)
            ->where('events.archived', '=', 'false')
            ->paginate(8);
        return [$gallery, $ev_theme];
    }
}
