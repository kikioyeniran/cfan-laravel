<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Gallery;
use App\Http\Controllers\actions\UtilitiesController;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function adminDisplayByEvent($link)
    {
        $new = new Gallery();
        $gall_arr = $new->getImageByLink($link);
        $gallery = $gall_arr[0];
        $ev_theme = $gall_arr[1];
        return view("gallery.admin")->with('gallery', $gallery)->with('ev_theme', $ev_theme);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        $evOptions = array('' => 'Select gallery') + $events->pluck('theme', 'id')->toArray();
        return view('gallery.create')->with('evOptions', $evOptions);
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
            'event' => 'required',
            'description' => 'required',
            // 'gall_img' => 'image|nullable|max:2999',
            'gall_img' => 'required',
            'gall_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2999'
        ]);
        //Handle file up0loads
        if ($request->hasFile('gall_img')) {
            //Get file name with extension
            if (is_array($request->file('gall_img'))) {
                foreach ($request->file('gall_img') as $image) {
                    $call = new UtilitiesController();
                    $fileNameToStore = $call->fileNameToStore($image);
                    //Create Post
                    $gallery = new Gallery;
                    $gallery->event_id = $request->input('event');
                    $gallery->description = $request->input('description');
                    $gallery->picture = $fileNameToStore;
                    $gallery->save();
                }
                $eid = $gallery->event_id;
                $new = new Event();
                $link = $new->getLink($eid);
                return redirect('/gallery/admin/' . $link)->with('success', 'Post created');
            } else {
                $call = new UtilitiesController();
                $fileNameToStore = $call->fileNameToStore($request->file('gall_img'));
                //Create Post
                $gallery = new Gallery;
                $gallery->event_id = $request->input('event');
                $gallery->description = $request->input('description');
                $gallery->picture = $fileNameToStore;
                $gallery->save();
                $eid = $gallery->event_id;
                $new = new Event();
                $link = $new->getLink($eid);
                return redirect('/gallery/admin/' . $link)->with('success', 'Post created');
            }
        } else {
            return redirect('/gallery/create')->with('fail', 'Post not created');
        }
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
        $events = Event::orderBy('created_at', 'desc')->get();
        $evOptions = array('' => 'Select gallery') + $events->pluck('theme', 'id')->toArray();
        $gallery = Gallery::find($id);
        return view('gallery.create')->with('post', $gallery)->with('evOptions', $evOptions);
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
            'event' => 'required',
            'description' => 'required',
            'gall_img' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('gall_img');
        //Handle file up0loads
        if ($request->hasFile('gall_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $gallery = Gallery::find($id);
        $gallery->event_id = $request->input('event');
        $gallery->description = $request->input('description');
        if ($request->hasFile('gall_img')) {
            $gallery->picture = $fileNameToStore;
        }
        $gallery->save();
        $eid = $gallery->event_id;
        $new = new Event();
        $link = $new->getLink($eid);
        return redirect('/gallery/admin/' . $link)->with('success', 'Post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery->picture != 'noImage.jpg') {
            // Delete image
            Storage::delete('public/pictures/' . $gallery->picture);
        }
        $gallery->delete();
        return redirect('/gallery/create')->with('success', 'Post Deleted');
    }
}
