<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Controllers\actions\UtilitiesController;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'displayByLink']]);
    }
    public function index()
    {
        $new = new Event();
        $events = $new->getEvents();
        return view('events.index')->with('events', $events);
    }
    public function all()
    {
        $new = new Event();
        $events = $new->getEvents();
        return view('events.all')->with('events', $events);
    }
    public function displayByLink($link)
    {
        $new = new Event();
        $arr = $new->getEventByLink($link);
        $event = $arr[0];
        $gallery = $arr[1];
        return view('events.show')->with('event', $event)->with('gallery', $gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'theme' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'event_img' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('event_img');
        //Handle file up0loads
        if ($request->hasFile('event_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $theme = $request->input('theme');
        $arr = explode(" ", $theme);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($theme);
        }
        $event = new Event;
        $event->theme = $theme;
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $event->picture = $fileNameToStore;
        $event->link = $link;
        $event->save();
        return redirect('/events/all')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('events.edit')->with('post', $events);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'theme' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'event_img' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('event_img');
        //Handle file up0loads
        if ($request->hasFile('event_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $theme = $request->input('theme');
        $arr = explode(" ", $theme);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($theme);
        }
        $event = Event::find($id);
        $event->theme = $theme;
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $event->link = $link;
        if ($request->hasFile('event_img')) {
            $event->picture = $fileNameToStore;
        }
        $event->save();
        return redirect('/events/all')->with('success', 'Post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Archive events
    public function archive($id)
    {
        $events = Event::find($id);
        $events->archived = 'true';
        $events->save();
        return redirect('/events/all')->with('success', 'Post archived');
    }

    // Restore archived events
    public function restore($id)
    {
        $events = Event::find($id);
        $events->archived = 'false';
        $events->save();
        return redirect('/events/archived')->with('success', 'Post Restored');
    }

    // Display archived events
    public function archived()
    {
        $new = new Event();
        $d_events = $new->getArchivedevents();
        return view('events.archived')->with('events', $d_events);
    }
}
